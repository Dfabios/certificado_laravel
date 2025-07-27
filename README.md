# 🎓 Sistema de Gestão de Certificados de Mestrado

Este projeto é uma aplicação web para gerenciar certificados de defesas de mestrado, com foco em organização de títulos, orientadores, coorientadores, bancas e orientandos. Desenvolvido com Laravel 12, Laravel Breeze, Blade e Bootstrap.

---

## 🚀 Funcionalidades

- 🔐 Autenticação de usuários (Laravel Breeze)
- 📚 Cadastro de títulos de dissertação
- 👨‍🏫 Gerenciamento de orientadores e coorientadores
- 👥 Controle de orientandos
- 🧑‍⚖️ Montagem de bancas examinadoras
- 📄 Geração de certificados em PDF
- ✅ Interface limpa com Bootstrap

---

## 🛠️ Tecnologias Utilizadas

- [Laravel 12](https://laravel.com/)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Blade](https://laravel.com/docs/blade)
- [Bootstrap 5](https://getbootstrap.com/)
- [MySQL](https://www.mysql.com/)
- [DomPDF (PDF generation)](https://github.com/barryvdh/laravel-dompdf)

---

## 📦 Instalação

### Pré-requisitos

- PHP 8.1+
- Composer
- Node.js e NPM
- MySQL

### Passos:

1. **Clone o projeto**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
Instale as dependências

bash
Copiar
Editar
composer install
npm install
npm run dev
Configure o ambiente

bash
Copiar
Editar
cp .env.example .env
php artisan key:generate
Configure o banco de dados no .env:

makefile
Copiar
Editar
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=certificados_mestrado
DB_USERNAME=root
DB_PASSWORD=
Rode as migrações

bash
Copiar
Editar
php artisan migrate
Inicie o servidor

bash
Copiar
Editar
php artisan serve
📁 Estrutura do Projeto
app/Models - Models do sistema

app/Http/Controllers - Lógica dos controladores

resources/views - Templates Blade

routes/web.php - Rotas da aplicação

database/migrations - Estrutura das tabelas

🧪 Em Desenvolvimento
Painel de administração

Edição de certificados já emitidos

Histórico de alterações

📝 Licença
Este projeto é open-source sob a licença MIT.

👨‍💻 Desenvolvedor
Fábio Salvador dos Santos Ferreira
🔗 GitHub
📧 fabio@example.com




