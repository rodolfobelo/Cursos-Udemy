idade = int(input('Entre com sua idade: '))

if idade < 18 and idade >= 0:
    print('Menor de idade')
elif idade >= 18 and idade < 60:
    print('Maior de idade e Adulto')
elif idade  >= 60 and idade < 80:
    print('Maior de idade e Idoso I')
elif idade > 80:
    print('Maior de idade e Idoso II')
else:
    print('Você ainda não nasceu')