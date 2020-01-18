define({ "api": [
  {
    "type": "get",
    "url": "/config",
    "title": "1. Read application config",
    "version": "0.1.0",
    "name": "GetConfig",
    "group": "App",
    "description": "<p>Read the application config data from server</p>",
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://localhost/TenisApp/api/web/v1/config",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.niveluri",
            "description": "<p>List of niveluri(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.niveluri.id",
            "description": "<p>Id nivel.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.niveluri.nume",
            "description": "<p>Nume nivel.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.stariSanatate",
            "description": "<p>List of stari de sanatate(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.stariSanatate.id",
            "description": "<p>Id stare de sanatate</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.stariSanatate.nume",
            "description": "<p>Numele starii de santate</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.judete",
            "description": "<p>List of judete(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.judete.id",
            "description": "<p>Id judet</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.judete.nume",
            "description": "<p>Numele judetului</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.tipAntrenament",
            "description": "<p>List of tipuri antrenamente(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.tipAntrenament.id",
            "description": "<p>Id tip antrenament</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tipAntrenament.denumirea",
            "description": "<p>Numele judetului</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "data.tipAntrenament.activ",
            "description": "<p>Starea tipului de antrenament</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n        \"niveluri\": [\n            {\n                \"id\": 1,\n                \"nume\": \"Incepator\"\n            }\n        ],\n        \"stariSanatate\": [\n            {\n                \"id\": 1,\n                \"nume\": \"Sanatos\"\n            }\n        ],\n        \"judete\": [\n            {\n                \"id\": 1,\n                \"nume\": \"Alba\"\n            }\n        ],\n        \"tipAntrenament\": [\n            {\n                \"id\": 1,\n                \"denumirea\": \"Forehand\",\n                \"activ\": 1\n            }\n        ]\n    },\n    \"messages\": null,\n    \"message\": \"OK\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Config.js",
    "groupTitle": "App",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/config"
      }
    ]
  },
  {
    "type": "get",
    "url": "/localitati",
    "title": "2. Read all localitati",
    "version": "0.1.0",
    "name": "GetLocalitati",
    "group": "App",
    "description": "<p>Read the application localitati array of data from server</p>",
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://localhost/TenisApp/api/web/v1/localitati",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.localitatis",
            "description": "<p>List of localitatit(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.localitatis.id",
            "description": "<p>Id judet.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.localitatis.judet",
            "description": "<p>Judetul localitatii.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.localitatis.nume",
            "description": "<p>Denumirea localitatii.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "data.localitatis.oras",
            "description": "<p>Daca localitatea este un oras sau nu</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n        \"localitatis\": [\n            {\n                \"id\": 1,\n                \"judet\": 1,\n                \"nume\": \"Alba Iulia\",\n                \"oras\": 1\n            }\n        ],\n        \"_links\": {\n            \"self\": {\n                \"href\": \"http://localhost/TenisApp/api/web/v1/localitati?id=1&page=1\"\n            },\n            \"next\": {\n                \"href\": \"http://localhost/TenisApp/api/web/v1/localitati?id=1&page=2\"\n            },\n            \"last\": {\n                \"href\": \"http://localhost/TenisApp/api/web/v1/localitati?id=1&page=635\"\n            }\n        },\n        \"_meta\": {\n            \"totalCount\": 12699,\n            \"pageCount\": 635,\n            \"currentPage\": 1,\n            \"perPage\": 20\n        }\n    },\n    \"messages\": null,\n    \"message\": \"OK\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Localitati.js",
    "groupTitle": "App",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/localitati"
      }
    ]
  },
  {
    "type": "post",
    "url": "/sportivi",
    "title": "1. Create sportiv",
    "version": "0.1.0",
    "name": "CreateSportiv",
    "group": "Sportiv",
    "description": "<p>Create sportiv by sending data to server</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nume",
            "description": "<p>Numele sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "prenume",
            "description": "<p>Prenumele sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "data_nastere",
            "description": "<p>Data nastere sportiv in formatul dd.mm.yyyy.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "nivel",
            "description": "<p>Nivel sportiv, id-ul unui obiect nivel.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "greutate",
            "description": "<p>Greutatea sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "inaltime",
            "description": "<p>Inaltimea sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "stare_sanatate",
            "description": "<p>Stare sanatate sportiv, id-ul unui obiect stare de sanatate.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "telefon",
            "description": "<p>Telefonul sportivului</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "localitate",
            "description": "<p>Localitatea sportivului</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "allowedValues": [
              "1-barbat",
              "0-femeie"
            ],
            "optional": false,
            "field": "sex",
            "defaultValue": "1",
            "description": "<p>Genul sportivului</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>Id sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data.profil",
            "description": "<p>Profilul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.nume",
            "description": "<p>Numele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.prenume",
            "description": "<p>Prenumele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.profil.gen",
            "description": "<p>Genul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "data.profil.data_nastere",
            "description": "<p>Data nasterii sportivului</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.telefon",
            "description": "<p>Telefonul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.profil.localitate",
            "description": "<p>Id-ul localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.adresa",
            "description": "<p>Restul adresei sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.localitateText",
            "description": "<p>Numele localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.nivel",
            "description": "<p>Id nivel sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.greutate",
            "description": "<p>Greutatea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.inaltime",
            "description": "<p>Inaltimea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.stare_sanatate",
            "description": "<p>Id-ul starii de sanatate a sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nivelText",
            "description": "<p>Denumirea nivelului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.stareSanatateText",
            "description": "<p>Denumirea starii de sanatate.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "messages",
            "description": "<p>Lista de mesaje</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mesajul de eroare sau null</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>Codul requestului</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n                \"id\": 12,\n                \"profil\": {\n                    \"nume\": \"radu2\",\n                    \"prenume\": \"gheorghe1\",\n                    \"gen\": 1,\n                    \"data_nastere\": \"12.10.2001\",\n                    \"telefon\": \"+0726213098\",\n                    \"localitate\": 1,\n                    \"adresa\": null,\n                    \"localitateText\": \"Alba Iulia\"\n                },\n                \"nivel\": 1,\n                \"greutate\": 70,\n                \"inaltime\": 181,\n                \"stare_sanatate\": 1,\n                \"nivelText\": \"Incepator\",\n                \"stareSanatateText\": \"Sanatos\"\n    },\n    \"messages\": null,\n    \"message\": \"Created\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Sportivi.js",
    "groupTitle": "Sportiv",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/sportivi"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Auth header with JWT Token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Authorization-Example:",
          "content": "Authorization: Bearer <jwt-token>",
          "type": "String"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/sportivi",
    "title": "3. Read all sportivi",
    "version": "0.1.0",
    "name": "GetSportivi",
    "group": "Sportiv",
    "description": "<p>Read all sportivi array of data from server</p>",
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://localhost/TenisApp/api/web/v1/sportivi",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.sportivis",
            "description": "<p>List of sportivi(Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.sportivis.id",
            "description": "<p>Id sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data.sportivis.profil",
            "description": "<p>Profilul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.profil.nume",
            "description": "<p>Numele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.profil.prenume",
            "description": "<p>Prenumele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.sportivis.profil.gen",
            "description": "<p>Genul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "data.sportivis.profil.data_nastere",
            "description": "<p>Data nasterii sportivului</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.profil.telefon",
            "description": "<p>Telefonul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.sportivis.profil.localitate",
            "description": "<p>Id-ul localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.profil.adresa",
            "description": "<p>Restul adresei sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.profil.localitateText",
            "description": "<p>Numele localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.sportivis.nivel",
            "description": "<p>Id nivel sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.sportivis.greutate",
            "description": "<p>Greutatea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.sportivis.inaltime",
            "description": "<p>Inaltimea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.sportivis.stare_sanatate",
            "description": "<p>Id-ul starii de sanatate a sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.nivelText",
            "description": "<p>Denumirea nivelului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.sportivis.stareSanatateText",
            "description": "<p>Denumirea starii de sanatate.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "messages",
            "description": "<p>Lista de mesaje</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mesajul de eroare sau null</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>Codul requestului</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n        \"sportivis\": [\n            {\n                \"id\": 12,\n                \"profil\": {\n                    \"nume\": \"radu2\",\n                    \"prenume\": \"gheorghe1\",\n                    \"gen\": 1,\n                    \"data_nastere\": \"12.10.2001\",\n                    \"telefon\": \"+0726213098\",\n                    \"localitate\": 1,\n                    \"adresa\": null,\n                    \"localitateText\": \"Alba Iulia\"\n                },\n                \"nivel\": 1,\n                \"greutate\": 70,\n                \"inaltime\": 181,\n                \"stare_sanatate\": 1,\n                \"nivelText\": \"Incepator\",\n                \"stareSanatateText\": \"Sanatos\"\n            }\n        ],\n        \"_links\": {\n            \"self\": {\n                \"href\": \"http://localhost/TenisApp/api/web/v1/sportivi?page=1\"\n            }\n        },\n        \"_meta\": {\n            \"totalCount\": 4,\n            \"pageCount\": 1,\n            \"currentPage\": 1,\n            \"perPage\": 20\n        }\n    },\n    \"messages\": null,\n    \"message\": \"OK\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Sportivi.js",
    "groupTitle": "Sportiv",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/sportivi"
      }
    ]
  },
  {
    "type": "post",
    "url": "/sportivi/:id",
    "title": "2. Update sportiv",
    "version": "0.1.0",
    "name": "UpdateSportiv",
    "group": "Sportiv",
    "description": "<p>Update sportiv by sending data to server</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Id-ul sportivului ce urmeaza a fi modificat;</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nume",
            "description": "<p>Numele sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "prenume",
            "description": "<p>Prenumele sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "data_nastere",
            "description": "<p>Data nastere sportiv in formatul dd.mm.yyyy.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "nivel",
            "description": "<p>Nivel sportiv, id-ul unui obiect nivel.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "greutate",
            "description": "<p>Greutatea sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "inaltime",
            "description": "<p>Inaltimea sportivului.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "stare_sanatate",
            "description": "<p>Stare sanatate sportiv, id-ul unui obiect stare de sanatate.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "telefon",
            "description": "<p>Telefonul sportivului</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "localitate",
            "description": "<p>Localitatea sportivului</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "allowedValues": [
              "1-barbat",
              "0-femeie"
            ],
            "optional": false,
            "field": "sex",
            "defaultValue": "1",
            "description": "<p>Genul sportivului</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>Id sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data.profil",
            "description": "<p>Profilul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.nume",
            "description": "<p>Numele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.prenume",
            "description": "<p>Prenumele sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.profil.gen",
            "description": "<p>Genul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "data.profil.data_nastere",
            "description": "<p>Data nasterii sportivului</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.telefon",
            "description": "<p>Telefonul sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.profil.localitate",
            "description": "<p>Id-ul localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.adresa",
            "description": "<p>Restul adresei sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.profil.localitateText",
            "description": "<p>Numele localitatii sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.nivel",
            "description": "<p>Id nivel sportiv.</p>"
          },
          {
            "group": "Success 200",
            "type": "Nunber",
            "optional": false,
            "field": "data.greutate",
            "description": "<p>Greutatea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.inaltime",
            "description": "<p>Inaltimea sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.stare_sanatate",
            "description": "<p>Id-ul starii de sanatate a sportivului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nivelText",
            "description": "<p>Denumirea nivelului.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.stareSanatateText",
            "description": "<p>Denumirea starii de sanatate.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "messages",
            "description": "<p>Lista de mesaje</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mesajul de eroare sau null</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>Codul requestului</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n                \"id\": 12,\n                \"profil\": {\n                    \"nume\": \"radu2\",\n                    \"prenume\": \"gheorghe1\",\n                    \"gen\": 1,\n                    \"data_nastere\": \"12.10.2001\",\n                    \"telefon\": \"+0726213098\",\n                    \"localitate\": 1,\n                    \"adresa\": null,\n                    \"localitateText\": \"Alba Iulia\"\n                },\n                \"nivel\": 1,\n                \"greutate\": 70,\n                \"inaltime\": 181,\n                \"stare_sanatate\": 1,\n                \"nivelText\": \"Incepator\",\n                \"stareSanatateText\": \"Sanatos\"\n    },\n    \"messages\": null,\n    \"message\": \"Created\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Sportivi.js",
    "groupTitle": "Sportiv",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/sportivi/:id"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Auth header with JWT Token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Authorization-Example:",
          "content": "Authorization: Bearer <jwt-token>",
          "type": "String"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/users",
    "title": "2. Create user",
    "version": "0.3.0",
    "name": "CreateUser",
    "group": "Utilizator",
    "description": "<p>Create user based on email, password and type</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>The User email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>The User password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "antrenor|sportiv",
            "description": "<p>The User account type</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>Id-ul utilizatorului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.auth_key",
            "description": "<p>Token pentru autentificarea utilizatorului in serviciul API</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.email",
            "description": "<p>Email-ul utilizatorului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "messages",
            "description": "<p>Lista de mesaje</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mesajul de eroare sau null</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n        \"email\": \"antrenor_test@yahoo.com\",\n        \"auth_key\": \"WaD1t2d0zVJLYJi6QfUN76x-7qPQLpsZ\",\n        \"id\": 23\n    },\n    \"messages\": null,\n    \"message\": \"Created\",\n    \"code\": 201\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error Response (example):",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": false,\n    \"data\": null,\n    \"messages\": [\n        {\n            \"field\": \"type\",\n            \"message\": \"«Type» nu poate fi gol.\"\n        }\n    ],\n    \"message\": \"«Type» nu poate fi gol.\",\n    \"code\": 422\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Utilizatori.js",
    "groupTitle": "Utilizator",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/users"
      }
    ]
  },
  {
    "type": "get",
    "url": "/users/login/:email/:password",
    "title": "1. Login user",
    "version": "0.3.0",
    "name": "LoginUser",
    "group": "Utilizator",
    "description": "<p>Login user based on email and password</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>The User email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>The User password</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://localhost/TenisApp/api/web/v1/users/login/admin@tennisapp.com/123456",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "success",
            "description": "<p>Request status</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Config data object</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>Id-ul utilizatorului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.auth_key",
            "description": "<p>Token pentru autentificarea utilizatorului in serviciul API</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.email",
            "description": "<p>Email-ul utilizatorului.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "messages",
            "description": "<p>Lista de mesaje</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mesajul de eroare sau null</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": true,\n    \"data\": {\n        \"id\": 1,\n        \"auth_key\": \"GatxmzxOUv7U09DNC9Nqzz5QopANINr-\",\n        \"email\": \"admin@tennisapp.com\"\n    },\n    \"messages\": null,\n    \"message\": \"OK\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error Response (example):",
          "content": "HTTP/1.1 200 OK\n {\n    \"success\": false,\n    \"data\": null,\n    \"messages\": [\n        {\n            \"field\": \"email\",\n            \"message\": \"Credentiale invalide\"\n        }\n    ],\n    \"message\": \"Credentiale invalide\",\n    \"code\": 422\n}",
          "type": "json"
        }
      ]
    },
    "filename": "modules/v1/apiDoc/Utilizatori.js",
    "groupTitle": "Utilizator",
    "sampleRequest": [
      {
        "url": "http://localhost/TenisApp/api/web/v1/users/login/:email/:password"
      }
    ]
  }
] });
