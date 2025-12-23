# Laravel City API – Enterprise Architecture Example

A **modern, enterprise-grade Laravel REST API** demonstrating clean architecture, scalability, and real-world backend engineering practices.

This project is designed as a **reference implementation** showcasing how to build a maintainable, testable, and extensible API using Laravel.

---

## 🚀 Features Overview

### Core
- RESTful API for managing **City** resources
- Clean separation of concerns (Controller → CQRS → Service → Repository)
- Eloquent ORM with repository abstraction

### Architecture & Patterns
- **Repository Pattern** (array & Eloquent implementations)
- **Service Layer**
- **DTOs (Data Transfer Objects)**
- **CQRS (Command Query Responsibility Segregation)**
- **Event Sourcing (lightweight, audit-ready)**

### Security
- **Laravel Sanctum authentication**
- **Policy-based authorization (RBAC-ready)**

### Performance & Scalability
- **Redis caching**
- **Async queues (Redis-backed jobs)**
- Pagination, filtering, and search

### Observability
- Structured API metrics logging
- Dedicated metrics log channel
- Centralized error logging

### Testing
- **Pest** for clean, expressive tests
- Feature tests (API + auth)
- Unit tests with mocked repositories

### Documentation
- **Swagger / OpenAPI** auto-generated API docs

---

## 🧱 Project Architecture

Controller
↓
CQRS (Commands / Queries)
↓
Service Layer
↓
Repository (Array | Eloquent)
↓
Database / Cache / Events


This architecture allows:
- Easy swapping of persistence layers
- Clear separation of read/write logic
- Scalable growth into microservices

---

## 📁 Project Structure (Simplified)

app/
├── CQRS/
├── DTOs/
├── Events/
├── Jobs/
├── Http/
│ ├── Controllers/
│ ├── Requests/
│ ├── Resources/
│ └── Middleware/
├── Models/
├── Policies/
├── Repositories/
├── Services/
└── Providers/


---

## 🔐 Authentication

This API uses **Laravel Sanctum** for token-based authentication.

### Login
POST /api/login


Response:
```json
{
  "token": "YOUR_API_TOKEN",
  "token_type": "Bearer"
}

Authorized Requests
Authorization: Bearer YOUR_API_TOKEN

📊 Pagination & Filtering

Examples:

GET /api/cities?page=2
GET /api/cities?country=Ethiopia
GET /api/cities?search=Addis&per_page=5

📦 API Documentation (Swagger)

Swagger UI is available at:

/api/documentation


Generate docs:

php artisan l5-swagger:generate

🔄 Event Sourcing

All state changes are recorded as events:

CityCreated

CityUpdated

Events are stored in the city_events table and can be replayed for:

Auditing

Debugging

Projections

⚡ Caching & Queues

Redis used for:

API caching

Async job processing

Cache automatically invalidated on write operations

Queue workers handle non-blocking tasks

Start worker:

php artisan queue:work

🧪 Testing

This project uses Pest for modern testing syntax.

Run all tests:

php artisan test


Test types:

Feature tests (HTTP + auth)

Unit tests (services, repositories, CQRS handlers)

Mocked dependencies for fast execution

🛠️ Installation
Requirements

PHP 8.1+

Composer

Redis

MySQL or PostgreSQL

Setup
git clone https://github.com/your-username/laravel-city-api.git
cd laravel-city-api

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate

🧠 Design Philosophy

This project prioritizes:

Maintainability over shortcuts

Explicit architecture over magic

Testability from day one

Scalability without premature optimization

It is intentionally over-architected for learning, interviews, and portfolio demonstration.

📌 Use Cases

Senior Laravel portfolio project

Architecture reference

Interview discussion project

API foundation for SaaS products

Backend training material

🏆 Author

Hailemichael Assefa
Software Engineer | Full-Stack Developer
Specialized in Laravel, React, and scalable backend systems

📄 License

This project is open-sourced for educational and demonstration purposes.


---

If you want, I can also:
- 🔥 Tailor this README for **GitHub recruiters**
- 📊 Add **API endpoint tables**
- 🐳 Add **Docker instructions**
- ⚛️ Add **React frontend setup**
- 🧪 Add **coverage badges**

Just tell me how you want to finalize it.