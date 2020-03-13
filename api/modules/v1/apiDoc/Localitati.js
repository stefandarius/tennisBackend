/**
 * @api {get} /localitati 2. Read all localitati
 * @apiVersion 0.1.0
 * @apiName GetLocalitati
 * @apiGroup App
 * @apiDescription Read the application localitati array of data from server
 *
 * @apiExample Example usage:
 * curl -i http://tenis.anunturicl.ro/api/web/v1/localitati
 * @apiSampleRequest off
 * @apiParam (Query string) {String} [fields] Provide only the database fields where you are interested in. Eg: 
 * ```
 * fields=nume,judet
 * ```
 * @apiParam (Query string) {String} [filter[field_name]] Filter the data based on a selector. `field_name` should be the database field. 
 * Available selectors: EQ (default), NEQ, GT, GTE, LT, LTE, IN, NIN, AND, OR, NOT, LIKE. Eg: 
 * ```
 * filter[nume][LIKE] = %Melroy%
 * ```
 * @apiParam (Query string) {String} [sort] Order either ascending (ASC) or descending (DESC). Eg: 
 * ```
 * sort=-nume (DESC)|sort=nume (ASC)
 * ```
 * @apiParam (Query string) {Integer} [page] Page number. Eg: 
 * ```
 * page=2
 * ```
 * @apiParam (Query string) {Integer} [per-page] Number of records per page. Eg: 
 * ```
 * per-page=5
 * ```
 * @apiSuccess {Boolean}  success      					Request status
 * @apiSuccess {Object}   data       					Config data object
 * @apiSuccess {Object[]} data.localitatis 				List of localitatit(Array of Objects).
 * @apiSuccess {Number}   data.localitatis.id 			Id judet.
 * @apiSuccess {Number}   data.localitatis.judet   		Judetul localitatii.
 * @apiSuccess {String}   data.localitatis.nume   		Denumirea localitatii.
 * @apiSuccess {Boolean}  data.localitatis.oras			Daca localitatea este un oras sau nu 			
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
        "localitatis": [
            {
                "id": 1,
                "judet": 1,
                "nume": "Alba Iulia",
                "oras": 1
            }
        ],
        "_links": {
            "self": {
                "href": "http://localhost/TenisApp/api/web/v1/localitati?id=1&page=1"
            },
            "next": {
                "href": "http://localhost/TenisApp/api/web/v1/localitati?id=1&page=2"
            },
            "last": {
                "href": "http://localhost/TenisApp/api/web/v1/localitati?id=1&page=635"
            }
        },
        "_meta": {
            "totalCount": 12699,
            "pageCount": 635,
            "currentPage": 1,
            "perPage": 20
        }
    },
    "messages": null,
    "message": "OK",
    "code": 200
}
 */
function getConfig() { return; }
