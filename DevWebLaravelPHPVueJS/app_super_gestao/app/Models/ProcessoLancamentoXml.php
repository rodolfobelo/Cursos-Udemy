<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Exception;
use SoapClient;

class ProcessoLancamentoXml extends Model
{
    use HasFactory;

    const PROCCESS_NAME = 'FinAcordoGeracaoProcData';
    const XML_OVERRIDE_FILE_NAME = "/modelo_xml/pagamento.xml";

    private $dataXml;

    public function __construct($data)
    {
        $this->dataXml = $data;
    }

    public function execute()
    {
        $xmlPopulated = $this->_getDataXmlByModelFile();

        $responseReleaseLaunch = $this->executeProccess(self::PROCCESS_NAME, $xmlPopulated);

        $isProcessError = Str::contains($responseReleaseLaunch, ['Exception']);

        if ($isProcessError) {
            throw new Exception(strtok($responseReleaseLaunch, "\r\n"));
        }

        return [
            'is_processed' => $responseReleaseLaunch == '1',
            'xml_downloaded' => $xmlPopulated,
        ];
    }

    public function _getDataXmlByModelFile()
    {
        $data = $this->dataXml;
        $xml = file_get_contents(public_path() . self::XML_OVERRIDE_FILE_NAME);

        foreach ($data as $key => $value) {
            $xml = str_replace("@{$key}@", $value,  $xml);
        }

        file_put_contents(public_path() . "/xml_populado/pagamento.xml", $xml);
        return $xml;
    }

    private function executeProccess(string $processServerName, $dataXml)
    {
        $soapClient = $this->getClientSoapToProccess();

        $dataXmlString = preg_replace('~\s+~u', ' ', trim($dataXml));

        $soapClientResult = $soapClient->ExecuteWithParams([
            'ProcessServerName' => $processServerName,
            'strXmlParams'      => $dataXmlString
        ]);

        return $soapClientResult->ExecuteWithParamsResult;
    }

    private function getClientSoapToProccess()
    {
        return new SoapClient(env('WEBSERVICE_PROCESS_URL'), [
            'trace'             => 1,
            'exceptions'        => 1,
            'login'             => env('WEBSERVICE_PROCESS_USER'),
            'password'          => env('WEBSERVICE_PROCESS_PASS'),
            'authentication'    => SOAP_AUTHENTICATION_BASIC,
        ]);
    }
}