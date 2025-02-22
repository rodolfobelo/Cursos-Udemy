from time import process_time_ns

valor_produto = float(input('Entre com o valor do produto: '))
valor_acrescimo = float(input('Qual percentual para aumento? ')) / 100
nome_produto = input('Entre com nome do produto: ')

valor_acrescimo = valor_produto*valor_acrescimo
valor_produto = valor_produto + valor_acrescimo
'''print(valor_produto)
print(valor_acrescimo)
print(nome_produto.upper())'''

print('O produto ' + nome_produto.upper() + ' aumentou ' + str(valor_acrescimo) + ' 100%. Valor final do produto é R$ ' + str(valor_produto))