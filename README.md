## Documentação do Aplicação

 - Foram usadas duas docker images: [laradock](https://laradock.io/) , [postgres](https://hub.docker.com/_/postgres).
 
 ### Rodando à aplicação:
    - Siga as instruções para instalar o [laradock](https://laradock.io/) e como rodar o projeto dentro dele;
    - Crie a sua imagem do POSTGRES;
    - Configure a conexão com o banco dentro do .env da aplicação;
        DB_CONNECTION=pgsql
        DB_HOST=SEU-HOST
        DB_PORT=5432
        DB_DATABASE=NOME-DO-BANCO
        DB_USERNAME=USER
        DB_PASSWORD=PASSWORD
        
    -  Após isso entre no bash do laradock, vá até a pasta da aplicação e execute os seguintes comandos: 
            1. COMPOSER INSTALL
            2. PHP ARTISAN MIGRATE
            3. PHP ARTISAN KEY:GENERATE
            4. PHP ARTISAN STORAGE:LINK
            5. PHP ARTISAN JWT:SECRET
            
        Feito isso o projeto estará rodando;
        
        
        
 # Documentação da API
 - A doc da API está em um arquivo JSON na raiz do projeto onde pode ser importada para dentro do INSOMINIA OU PostMan
