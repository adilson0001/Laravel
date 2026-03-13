# Guia de Configuração Laravel

Este guia contém os passos essenciais para configurar o ambiente de desenvolvimento **Laravel** em sistemas **Windows**.

---

## 1. Instalação do Ambiente

### Instalação do PHP

Execute o seguinte comando no **PowerShell** para instalar o PHP:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

### Instalação do Composer

O **Composer** é o gerenciador de dependências do PHP.

Você pode realizar a instalação manual através do site oficial:

```
https://getcomposer.org
```
### Instalação do Laravel Installer

Após instalar o **PHP** e o **Composer**, instale o instalador global do Laravel:

```bash
composer global require laravel/installer
```

---

## 2. Criando e Rodando Projetos

### Criar um novo projeto

Para criar uma nova aplicação Laravel, utilize o comando:

```bash
laravel new example-app
```

Durante a criação do projeto, o instalador fará algumas perguntas de configuração.

---

### O Passo a Passo das Perguntas

#### Which starter kit would you like to install?

**Resposta:** `none`

**Por que:**  
Esta é a pergunta mais importante. Ao escolher `none`, o Laravel 
**não instalará React, Vue ou Inertia**.  
Assim, você terá apenas o **back-end puro do Laravel**, ideal para quem quer aprender a estrutura do framework ou montar o front-end manualmente.

---

#### Which authentication provider do you prefer?

**Resposta:** `none`  
ou  
**Resposta:** `laravel` (caso queira o sistema de login pronto usando Blade).

**Dica:**  
- Se você quer **aprender a montar seu próprio HTML/CSS**, escolha `none`.  
- Se quiser um **sistema de login pronto**, escolha `laravel`, que já cria as telas usando a engine de templates padrão do Laravel (**Blade**).

---

#### Which testing framework do you prefer?

**Resposta:** `0` — **Pest**

**Por quê:**  
O **Pest** é mais simples e amigável que o PHPUnit, sendo uma ótima escolha para quem está começando.

---

#### Do you want to install Laravel Boost to improve AI assisted coding?

**Resposta:** `yes`

**Por quê:**  
Isso ajuda ferramentas de **IA a entenderem melhor a estrutura do projeto**, facilitando assistência e geração de código.

Para criar uma nova aplicação Laravel, utilize o comando:

```bash
laravel new example-app
```

### Configuração Inicial

Após criar o projeto, entre na pasta e prepare o ambiente de **assets (CSS/JS)**:

```bash
cd example-app
npm install
npm run build
```

### Executando o Projeto

Para iniciar o servidor de desenvolvimento, utilize o comando para rodar os scripts de desenvolvimento:

```bash
composer run dev
```

---

## Nota Importante

Para desenvolvimento **full-stack com Laravel + React/Vue**, você normalmente precisa manter **dois terminais abertos**:

**Servidor Back-end (Laravel):**

```bash
php artisan serve
```

**Compilador de Assets em tempo real:**

```bash
npm run dev
```


