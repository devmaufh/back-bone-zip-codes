# Zip codes API
Basado en [Zip code utilities](https://staging.boolean.mx/apidocs#api-Utilities-Zip_code).

Esta es la respuesta del API original
```json
{
  "zip_code": "38110",
  "locality": "",
  "federal_entity": {
    "key": 11,
    "name": "GUANAJUATO",
    "code": "GTO"
  },
  "settlements": [
    {
      "key": 2551,
      "name": "YUSTIS (SAN JOSE DE YUSTIS)",
      "zone_type": "Rural",
      "settlement_type": {
        "name": "Ejido"
      }
    },
  ],
  "municipality": {
    "key": 7,
    "name": "CELAYA"
  }
}
```
Al realizar un análisis sobre la respueta anterior y el banco de datos de correos de méxico sobre los [códigos postales](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx), se identificaron las siguientes entidades para modelar la información:
* ZipCode (zip_code, locality)
* FederalEntity(key, name, code)
* Municipality(key, name)
* SettlementType(name)
* Settlement(key, name, zone_type)

Una vez modelada la información se desarrollaron los siguientes endpoints:


## Federal Entity

#### Parámetros
| Campo | Tipo   | Descripción        |
|-------|--------|--------------------|
| name  | string | Nombre del estado  |
| code  | string | Código del estado  |

#### URL
```
http://localhost:8000/api/federalEntity
```
#### Request type
| URL                    | TIPO      | DESCRIPCIÓN                                               |
|------------------------|-----------|-----------------------------------------------------------|
| api/federalEntity      | GET       | Obtiene una lista paginada de las entidades federativas   |
| api/federalEntity      | POST      | Crea una nueva entidad federativa                         |
| api/federalEntity/{id} | PUT/PATCH | Edita la entidad federativa con el ID enviado en la URL   |
| api/federalEntity/{id} | DELETE    | Elimina la entidad federativa con el ID enviado en la URL |

## Municipalitys

#### Parámetros
| Campo           | Tipo   | Descripción                    |
|-----------------|--------|--------------------------------|
| name            | string | Nombre del municipio           |
| federal_entity  | string | Entidad federal del municipio  |

#### URL
```
http://localhost:8000/api/municipality
```
#### Request type
| URL                   | TIPO      | DESCRIPCIÓN                                      |
|-----------------------|-----------|--------------------------------------------------|
| api/municipality      | GET       | Obtiene una lista paginada de los municipios     |
| api/municipality      | POST      | Crea un nuevo municipio                          |
| api/municipality/{id} | PUT/PATCH | Edita el municipio con el ID enviado en la URL   |
| api/municipality/{id} | DELETE    | Elimina el municipio con el ID enviado en la URL |

## Zip Codes

#### Parámetros
| Campo        | Tipo    | Descripción                                        |
|--------------|---------|----------------------------------------------------|
| locality     | string  | Localidad del código postal                        |
| zip_code     | integer | Código postal                                      |
| municipality | integer | ID del municipio al que pertenece el código postal |

#### URL
```
http://localhost:8000/api/zip-codes
```
#### Request type
| URL                      | TIPO      | DESCRIPCIÓN                                                                                               |
|--------------------------|-----------|-----------------------------------------------------------------------------------------------------------|
| api/zip-codes            | GET       | Obtiene una lista paginada de los códigos postales                                                        |
| api/zip-codes            | POST      | Crea un nuevo código postal                                                                               |
| api/zip-codes/{id}       | PUT/PATCH | Edita el código postal con el ID enviado en la URL                                                        |
| api/zip-codes/{id}       | DELETE    | Elimina el código postal con el ID enviado en la URL                                                      |
| api/zip-codes/{zip_code} | GET       | Obtiene el municipio, entidad federativa, asentamientos e información del código postal enviado en la URL |
