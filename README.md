
##### Usando la misma interfaz de la pagina se puede hacer las acciones
##### Se creo una interfaz para consumir la API

## Consumir API autenticado 

### Rutas sin autorizacion (Publicas)
###### http://localhost:8000/api/auth/signup // Registro de usuario (POST)
        ...
            {
                "name": "mandarina",
                "email":"mandarina@mandarina.mandarina",
                "password" : "mandarina"
            }            
        ...

###### http://localhost:8000/api/auth/login // Inicio de sesion (POST), 

        ...
            {
                "email":"mandarina@mandarina.mandarina",
                "password" : "mandarina",
                "remember_me" : true

            }
            tendra como respuesta un "access_token", solo colocar el acces_token en el header
            
            Authorization : Bearer {access_token}
        ...
    
    - http://localhost:8000/api/auth/logout (GET) // Cerrar sesion, invalida el token
    - http://localhost:8000/api/auth/user (GET) // Verificar el usuario
    
### Rutas con autorizacion

    - http://localhost:8000/api/auth/articlesapi  // Todo los articulos (GET)
    - http://localhost:8000/api/auth/articlesapi/{art_code} // Ver solo un articulo (GET)
    
    - http://localhost:8000/api/auth/articlesapi/{art_code} // Para eliminar un articulo, (DELETE)
    - http://localhost:8000/api/auth/articlesapi/{art_code} // Para actualizar articulo, (PUT)

        Solo se puede editar 2 campos: ejemplo
                ...
                {
                    "nameArticle" : "Tercero articulo",
                    "quantityArticle" : 32
                }
                ...

    Ojo : {art_code} = Codigo de articulo
##
    - http://localhost:8000/api/auth/articlesapi // Para almacenar articulo, (POST)
    Ejemplo
#
    ...
        {
            "codeArticle":"CBAS",
            "nameArticle": "Sandalias",
            "quantityArticle": 12,
            "categorieArticle":"Zapatos"
        } 
    ...

##
http://localhost:8000/api/auth/articlesapi/{art_code} // Para eliminar articulo, (DELETE)