# 📦 Warehouse Monitoring System

Warehouse Monitoring System built with **CodeIgniter 4** and **MyAuth** for authentication.  
This project helps manage warehouse inventory including stock items, incoming/outgoing transactions, purchase records, and reports.

---

## 🚀 Features

- 🔑 Authentication (Login/Register) using [MyAuth](https://github.com/lonnieezell/myth-auth.)
- 📦 Manage products (CRUD)
- 🏷️ Manage categories (CRUD)
- 🛒 Purchase management
- ⬇️ Incoming items
- ⬆️ Outgoing items
- 📊 Reports (stock, incoming, outgoing by date)
- 📌 Dashboard summary

---

## ⚙️ Installation

### 1️⃣ Clone Repository

```bash
git clone https://github.com/raihanpcr/ci4app.git
cd ci4-warehouse
```

### 2️⃣ Install Dependencies

Make sure you have Composer installed, then run:

```
composer install
```

### 3️⃣ Setup Environment

Copy .env.example to .env and adjust database settings:

```
cp env .env
```

Edit .env file:

```
database.default.hostname = localhost
database.default.database = warehouse_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

4️⃣ Install & Configure MyAuth

Publish MyAuth resources:

```
php spark myauth:publish
```

Run migration for MyAuth tables:

```
php spark migrate
```

5️⃣ Run Project Migration & Seeder

```
php spark migrate --all
# Opsional
php spark db:seed CategorySeeder
```

6️⃣ Start Development Server

```
php spark serve
```
