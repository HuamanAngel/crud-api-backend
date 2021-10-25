## Usando la misma interfaz de la pagina se puede hacer las acciones

## Se creo una interfaz para consumir la API

## Consumir API

http://localhost:8000/api/articlesapi  // Todo los articulos (GET)
##
http://localhost:8000/api/articlesapi/{art_code} // Ver solo un articulo (GET)
##
http://localhost:8000/api/articlesapi // Para almacenar articulo, (POST)
##
    Ejemplo
#
        1 Clave                       Valor                                                
            - codeArticle                 CBAS
            - nameArticle                 Sandalias
            - quantityArticle             12
            - categorieArticle            Zapatos

##
http://localhost:8000/api/articlesapi/{art_code} // Para eliminar articulo, (DELETE)