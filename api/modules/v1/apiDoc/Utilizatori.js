/**
 * @api {get} /users/login/:email/:password 1. Login user
 * @apiVersion 0.3.0
 * @apiName LoginUser
 * @apiGroup Utilizator
 * @apiDescription Login user based on email and password
 *
 * @apiParam {String} email The User email.
 * @apiParam {String} password The User password
 *
 * @apiExample Example usage:
 * curl -i http://localhost/TenisApp/api/web/v1/users/login/admin@tennisapp.com/123456
 *
 * @apiSuccess {Boolean}  success      					Request status
 * @apiSuccess {Object}   data       					Config data object
 * @apiSuccess {Number}   data.id		 				Id-ul utilizatorului.
 * @apiSuccess {Number}   data.auth_key 				Token pentru autentificarea utilizatorului in serviciul API
 * @apiSuccess {String}   data.email   					Email-ul utilizatorului.
 * @apiSuccess {Object[]} messages						Lista de mesaje
 * @apiSuccess {String}	  message						Mesajul de eroare sau null
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
        "id": 1,
        "auth_key": "GatxmzxOUv7U09DNC9Nqzz5QopANINr-",
        "email": "admin@tennisapp.com"
    },
    "messages": null,
    "message": "OK",
    "code": 200
}
 * @apiErrorExample Error Response (example):
 * HTTP/1.1 200 OK
 {
    "success": false,
    "data": null,
    "messages": [
        {
            "field": "email",
            "message": "Credentiale invalide"
        }
    ],
    "message": "Credentiale invalide",
    "code": 422
}
 */

/**
 * @api {post} /users 2. Create user
 * @apiVersion 0.3.0
 * @apiName CreateUser
 * @apiGroup Utilizator
 * @apiDescription Create user based on email, password and type
 *
 * @apiParam {String} email The User email.
 * @apiParam {String} password The User password
 * @apiParam {String} type=antrenor|sportiv The User account type
 *
 *
 * @apiSuccess {Boolean}  success      					Request status
 * @apiSuccess {Object}   data       					Config data object
 * @apiSuccess {Number}   data.id		 				Id-ul utilizatorului.
 * @apiSuccess {Number}   data.auth_key 				Token pentru autentificarea utilizatorului in serviciul API
 * @apiSuccess {String}   data.email   					Email-ul utilizatorului.
 * @apiSuccess {Object[]} messages						Lista de mesaje
 * @apiSuccess {String}	  message						Mesajul de eroare sau null
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "success": true,
    "data": {
        "email": "antrenor_test@yahoo.com",
        "auth_key": "WaD1t2d0zVJLYJi6QfUN76x-7qPQLpsZ",
        "id": 23
    },
    "messages": null,
    "message": "Created",
    "code": 201
}
 * @apiErrorExample Error Response (example):
 * HTTP/1.1 200 OK
 {
    "success": false,
    "data": null,
    "messages": [
        {
            "field": "type",
            "message": "«Type» nu poate fi gol."
        }
    ],
    "message": "«Type» nu poate fi gol.",
    "code": 422
}
 */