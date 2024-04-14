## Requisitos
- php >= 8.2 
- Ver requerimientos de Codeigniter 4 https://codeigniter.com/user_guide/intro/requirements.html


## Instalación

primer paso:
Una vez copiado el repositorio, estando dentro de la carpeta raiz del proyecto ejecutar:
`composer install`

segundo paso:
copiar el archivo `env` a `.env`

tercer paso:
configurar la base de datos que va usar en el archivo `.env`
---
database.default.hostname = localhost
database.default.database = ci4
database.default.username = root
database.default.password = password
database.default.DBDriver = MySQLi
database.default.port = 3306
---

cuarto paso:
Ejecutar las migraciones
---
php spark migrate
---

Último paso:
Iniciar el servidor local `localhost:8080`
---
php spark serve
---
