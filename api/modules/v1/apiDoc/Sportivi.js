/**
 * @api {get} /sportivi 3. Read all sportivi
 * @apiVersion 0.1.0
 * @apiName GetSportivi
 * @apiGroup Sportiv
 * @apiDescription Read all sportivi array of data from server
 *
 * @apiExample Example usage:
 * curl -i http://tenis.anunturicl.ro/api/web/v1/sportivi
 *
 * @apiSuccess {Boolean}  success      							Request status
 * @apiSuccess {Object}   data       							Config data object
 * @apiSuccess {Object[]} data.sportivis 						List of sportivi(Array of Objects).
 * @apiSuccess {Number}   data.sportivis.id 					Id sportiv.
 * @apiSuccess {Object}   data.sportivis.profil   				Profilul sportivului.
 * @apiSuccess {String}   data.sportivis.profil.nume   			Numele sportivului.
 * @apiSuccess {String}   data.sportivis.profil.prenume   		Prenumele sportivului.
 * @apiSuccess {String}   data.sportivis.profil.nume   			Numele sportivului.
 * @apiSuccess {Number}   data.sportivis.profil.gen   			Genul sportivului.
 * @apiSuccess {Boolean}  data.sportivis.profil.data_nastere	Data nasterii sportivului 	
 * @apiSuccess {String}   data.sportivis.profil.telefon   		Telefonul sportivului.
 * @apiSuccess {Nunber}   data.sportivis.profil.localitate   	Id-ul localitatii sportivului.
 * @apiSuccess {String}   data.sportivis.profil.adresa   		Restul adresei sportivului.
 * @apiSuccess {String}   data.sportivis.profil.localitateText  Numele localitatii sportivului.
 * @apiSuccess {Number}   data.sportivis.nivel  				Id nivel sportiv.
 * @apiSuccess {Nunber}   data.sportivis.greutate   			Greutatea sportivului.
 * @apiSuccess {Number}   data.sportivis.inaltime   			Inaltimea sportivului.
 * @apiSuccess {Number}   data.sportivis.stare_sanatate  		Id-ul starii de sanatate a sportivului.
 * @apiSuccess {String}   data.sportivis.nivelText   			Denumirea nivelului.
 * @apiSuccess {String}   data.sportivis.stareSanatateText  	Denumirea starii de sanatate.
 * @apiSuccess {Object[]} messages								Lista de mesaje
 * @apiSuccess {String}	  message								Mesajul de eroare sau null
 * @apiSuccess {String}	  code									Codul requestului
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
        "sportivis": [
            {
                "id": 12,
                "profil": {
                    "nume": "radu2",
                    "prenume": "gheorghe1",
                    "gen": 1,
                    "data_nastere": "12.10.2001",
                    "telefon": "+0726213098",
                    "localitate": 1,
                    "adresa": null,
                    "localitateText": "Alba Iulia"
                },
                "nivel": 1,
                "greutate": 70,
                "inaltime": 181,
                "stare_sanatate": 1,
                "nivelText": "Incepator",
                "stareSanatateText": "Sanatos"
            }
        ],
        "_links": {
            "self": {
                "href": "http://localhost/TenisApp/api/web/v1/sportivi?page=1"
            }
        },
        "_meta": {
            "totalCount": 4,
            "pageCount": 1,
            "currentPage": 1,
            "perPage": 20
        }
    },
    "messages": null,
    "message": "OK",
    "code": 200
}
 */
 
 /**
 * @api {post} /sportivi 1. Create sportiv
 * @apiVersion 0.1.0
 * @apiName CreateSportiv
 * @apiGroup Sportiv
 * @apiDescription Create sportiv by sending data to server
 *
 * @apiParam {String} nume Numele sportivului.
 * @apiParam {String} prenume Prenumele sportivului.
 * @apiParam {String} data_nastere Data nastere sportiv in formatul dd.mm.yyyy.
 * @apiParam {Number} nivel Nivel sportiv, id-ul unui obiect nivel.
 * @apiParam {Number} greutate Greutatea sportivului.
 * @apiParam {Number} inaltime Inaltimea sportivului.
 * @apiParam {Number} stare_sanatate Stare sanatate sportiv, id-ul unui obiect stare de sanatate.
 * @apiParam {String} telefon Telefonul sportivului
 * @apiParam {Number} localitate Localitatea sportivului
 * @apiParam {Number=1-barbat,0-femeie} sex=1 Genul sportivului
 *
 * @apiSuccess {Boolean}  success      							Request status
 * @apiSuccess {Object}   data       							Config data object
 * @apiSuccess {Number}   data.id 								Id sportiv.
 * @apiSuccess {Object}   data.profil   						Profilul sportivului.
 * @apiSuccess {String}   data.profil.nume   					Numele sportivului.
 * @apiSuccess {String}   data.profil.prenume   				Prenumele sportivului.
 * @apiSuccess {String}   data.profil.nume   					Numele sportivului.
 * @apiSuccess {Number}   data.profil.gen   					Genul sportivului.
 * @apiSuccess {Boolean}  data.profil.data_nastere				Data nasterii sportivului 	
 * @apiSuccess {String}   data.profil.telefon   				Telefonul sportivului.
 * @apiSuccess {Nunber}   data.profil.localitate   				Id-ul localitatii sportivului.
 * @apiSuccess {String}   data.profil.adresa   					Restul adresei sportivului.
 * @apiSuccess {String}   data.profil.localitateText  			Numele localitatii sportivului.
 * @apiSuccess {Number}   data.nivel  							Id nivel sportiv.
 * @apiSuccess {Nunber}   data.greutate   						Greutatea sportivului.
 * @apiSuccess {Number}   data.inaltime   						Inaltimea sportivului.
 * @apiSuccess {Number}   data.stare_sanatate  					Id-ul starii de sanatate a sportivului.
 * @apiSuccess {String}   data.nivelText   						Denumirea nivelului.
 * @apiSuccess {String}   data.stareSanatateText  				Denumirea starii de sanatate.
 * @apiSuccess {Object[]} messages								Lista de mesaje
 * @apiSuccess {String}	  message								Mesajul de eroare sau null
 * @apiSuccess {String}	  code									Codul requestului
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
                "id": 12,
                "profil": {
                    "nume": "radu2",
                    "prenume": "gheorghe1",
                    "gen": 1,
                    "data_nastere": "12.10.2001",
                    "telefon": "+0726213098",
                    "localitate": 1,
                    "adresa": null,
                    "localitateText": "Alba Iulia"
                },
                "nivel": 1,
                "greutate": 70,
                "inaltime": 181,
                "stare_sanatate": 1,
                "nivelText": "Incepator",
                "stareSanatateText": "Sanatos"
    },
    "messages": null,
    "message": "Created",
    "code": 200
}
 * @apiUse AuthHeader
 */
 
  /**
 * @api {post} /sportivi/:id 2. Update sportiv
 * @apiVersion 0.1.0
 * @apiName UpdateSportiv
 * @apiGroup Sportiv
 * @apiDescription Update sportiv by sending data to server
 *
 * @apiParam {Number} id Id-ul sportivului ce urmeaza a fi modificat;
 * @apiParam {String} nume Numele sportivului.
 * @apiParam {String} prenume Prenumele sportivului.
 * @apiParam {String} data_nastere Data nastere sportiv in formatul dd.mm.yyyy.
 * @apiParam {Number} nivel Nivel sportiv, id-ul unui obiect nivel.
 * @apiParam {Number} greutate Greutatea sportivului.
 * @apiParam {Number} inaltime Inaltimea sportivului.
 * @apiParam {Number} stare_sanatate Stare sanatate sportiv, id-ul unui obiect stare de sanatate.
 * @apiParam {String} telefon Telefonul sportivului
 * @apiParam {Number} localitate Localitatea sportivului
 * @apiParam {Number=1-barbat,0-femeie} sex=1 Genul sportivului
 *
 * @apiSuccess {Boolean}  success      							Request status
 * @apiSuccess {Object}   data       							Config data object
 * @apiSuccess {Number}   data.id 								Id sportiv.
 * @apiSuccess {Object}   data.profil   						Profilul sportivului.
 * @apiSuccess {String}   data.profil.nume   					Numele sportivului.
 * @apiSuccess {String}   data.profil.prenume   				Prenumele sportivului.
 * @apiSuccess {String}   data.profil.nume   					Numele sportivului.
 * @apiSuccess {Number}   data.profil.gen   					Genul sportivului.
 * @apiSuccess {Boolean}  data.profil.data_nastere				Data nasterii sportivului 	
 * @apiSuccess {String}   data.profil.telefon   				Telefonul sportivului.
 * @apiSuccess {Nunber}   data.profil.localitate   				Id-ul localitatii sportivului.
 * @apiSuccess {String}   data.profil.adresa   					Restul adresei sportivului.
 * @apiSuccess {String}   data.profil.localitateText  			Numele localitatii sportivului.
 * @apiSuccess {Number}   data.nivel  							Id nivel sportiv.
 * @apiSuccess {Nunber}   data.greutate   						Greutatea sportivului.
 * @apiSuccess {Number}   data.inaltime   						Inaltimea sportivului.
 * @apiSuccess {Number}   data.stare_sanatate  					Id-ul starii de sanatate a sportivului.
 * @apiSuccess {String}   data.nivelText   						Denumirea nivelului.
 * @apiSuccess {String}   data.stareSanatateText  				Denumirea starii de sanatate.
 * @apiSuccess {Object[]} messages								Lista de mesaje
 * @apiSuccess {String}	  message								Mesajul de eroare sau null
 * @apiSuccess {String}	  code									Codul requestului
 * @apiPermission sportiv
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
                "id": 12,
                "profil": {
                    "nume": "radu2",
                    "prenume": "gheorghe1",
                    "gen": 1,
                    "data_nastere": "12.10.2001",
                    "telefon": "+0726213098",
                    "localitate": 1,
                    "adresa": null,
                    "localitateText": "Alba Iulia"
                },
                "nivel": 1,
                "greutate": 70,
                "inaltime": 181,
                "stare_sanatate": 1,
                "nivelText": "Incepator",
                "stareSanatateText": "Sanatos"
    },
    "messages": null,
    "message": "Created",
    "code": 200
}
 * @apiUse AuthHeader
 */
