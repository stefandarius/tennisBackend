/**
 * @api {get} /config 1. Read application config
 * @apiVersion 0.1.0
 * @apiName GetConfig
 * @apiGroup App
 * @apiDescription Read the application config data from server
 *
 * @apiExample Example usage:
 * curl -i http://localhost/TenisApp/api/web/v1/config
 *
 * @apiSuccess {Boolean}  success      					Request status
 * @apiSuccess {Object}   data       					Config data object
 * @apiSuccess {Object[]} data.niveluri 				List of niveluri(Array of Objects).
 * @apiSuccess {Number}   data.niveluri.id 				Id nivel.
 * @apiSuccess {String}   data.niveluri.nume   			Nume nivel.
 * @apiSuccess {Object[]} data.stariSanatate   			List of stari de sanatate(Array of Objects).
 * @apiSuccess {Number}	  data.stariSanatate.id 		Id stare de sanatate
 * @apiSuccess {String}	  data.stariSanatate.nume		Numele starii de santate
 * @apiSuccess {Object[]} data.judete   				List of judete(Array of Objects).
 * @apiSuccess {Number}	  data.judete.id 				Id judet
 * @apiSuccess {String}	  data.judete.nume				Numele judetului
 * @apiSuccess {Object[]} data.tipAntrenament   		List of tipuri antrenamente(Array of Objects).
 * @apiSuccess {Number}	  data.tipAntrenament.id 		Id tip antrenament
 * @apiSuccess {String}	  data.tipAntrenament.denumirea	Numele judetului
 * @apiSuccess {Boolean}  data.tipAntrenament.activ		Starea tipului de antrenament
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
        "niveluri": [
            {
                "id": 1,
                "nume": "Incepator"
            }
        ],
        "stariSanatate": [
            {
                "id": 1,
                "nume": "Sanatos"
            }
        ],
        "judete": [
            {
                "id": 1,
                "nume": "Alba"
            }
        ],
        "tipAntrenament": [
            {
                "id": 1,
                "denumirea": "Forehand",
                "activ": 1
            }
        ]
    },
    "messages": null,
    "message": "OK",
    "code": 200
}
 */
function getConfig() { return; }
