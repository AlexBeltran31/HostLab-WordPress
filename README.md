# hostlab.cl — WordPress local

Entorno local con wp-env (Docker).

## Requisitos
- Docker Desktop instalado y corriendo.

## Uso
    npm install        # solo la primera vez / tras clonar
    npx wp-env start    # levanta WordPress en http://localhost:8888
    npx wp-env stop      # lo apaga

Admin: http://localhost:8888/wp-admin  (usuario: admin / clave: password)
