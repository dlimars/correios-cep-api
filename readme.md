# API CEP
Api para consulta de CEP usando a base dos Correios


#### Iniciando o serviço
Inicie localmente usando:
`php -S localhost:8080 -t public`


#### Consultando um CEP:
acesse: `http://localhost:8080/cep/94010200`

o retorno deve ser algo parecido com:
```
    {
        success: true,
        text: "OK",
        data: {
            cep: "94010200",
            logradouro: "Rua Adolfo Inácio de Barcelos",
            complemento: "- até 795/796",
            bairro: "Centro",
            cidade: "Gravataí",
            uf: "RS"
        }
    }
```
