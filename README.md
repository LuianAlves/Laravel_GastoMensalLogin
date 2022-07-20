<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Projeto ainda em desenvolvimento!

<p><a href="#config"># Configuração Inicial do Projeto</a></p>

<hr>
<p id="config">

## Configurando o Projeto ...
 
        composer install --no-scripts
     
#Copie o arquivo .env.example

        cp .env.example .env

#Crie uma key para o projeto

        php artisan key:generate

#Configurar o arquivo .env com base no seu Banco de Dados e SMTP para recuperação de senhas 

#Execute as migrations

        php artisan migrate --seed


#Iniciando o projeto:

#Abra duas abas pelo terminal:

## 1° aba       

        php artisan migrate

## 2° aba       

        npm install 
        
        npm run dev 

</p> 
