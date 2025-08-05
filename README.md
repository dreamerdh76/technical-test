# Gestor de Tareas  
_Laravel 12 + Vue 3 (Vite)_

> Monorepo con un backend REST en **Laravel** y un frontend SPA en **Vue 3**. Permite listar, crear y completar tareas con palabras clave reutilizables.

---

## Contenido

```
technical-test/
├─ backend/        # Laravel (API)
└─ frontend/       # Vue 3 (Vite)
```

| Carpeta   | Descripción |
|-----------|-------------|
| **backend**  | API REST → `/api/v1/*` (`tasks`, `keywords`). |
| **frontend** | SPA que consume la API mediante Axios (`frontend/src/services/api.js`). |

---

## Requisitos

| Herramienta | Versión recomendada |
|-------------|--------------------|
| PHP         | ≥ 8.1 (exts: pdo, mbstring, xml, etc.) |
| Composer    | ≥ 2.5 |
| Node.js & npm | ≥ 18 LTS |
| Git         | ≥ 2.25 |
| (opcional) Docker Compose ≥ 2.0 |

---

## Instalación rápida

### 1 — Clonar el repo

```bash
git clone https://github.com/TU_USUARIO/technical-test.git
cd technical-test
```

### 2 — Backend (Laravel)

```bash
cd backend
composer install            # dependencias PHP
cp .env.example .env        # variables de entorno
php artisan key:generate
# Configura la DB (SQLite es el default → database/database.sqlite)
php artisan migrate         # tablas: tasks, keywords, pivot
php artisan serve --port=8000
```

> **Nota** : el backend expone `http://127.0.0.1:8000/api/v1/*`.

### 3 — Frontend (Vue 3)

```bash
cd ../frontend
npm install
npm run dev                 # por defecto en http://127.0.0.1:5173
```

---

## ⚙️ Cambiar la URL de la API

Si tu backend **no** corre en `http://127.0.0.1:8000`, ajusta una sola línea:

```
frontend/src/services/api.js
---------------------------------
export default axios.create({
  baseURL: 'http://TU_BACKEND:PUERTO/api/v1',
  headers: { Accept: 'application/json' }
})
```

Guarda y reinicia `npm run dev` para que el cambio surta efecto.

---

## Scripts útiles

| Comando (raíz)                | Acción |
|-------------------------------|--------|
| `npm run dev:front`           | `npm run dev --prefix frontend` |
| `npm run build:front`         | `npm run build --prefix frontend` |
| `composer test` (backend)     | Corre tests PHPUnit (si los añades) |

_Añade estos alias en `package.json` raíz si lo deseas._

---


- **api** → `http://localhost:8000/api/v1/`  
- **web** → `http://localhost:5173`

Mira `docker-compose.yml` para personalizar puertos o volúmenes.

---

## Contribuir

1. Haz un **fork** y crea tu rama: `git checkout -b feature/mi-mejora`  
2. Commits con formato _Conventional Commits_ (`feat:`, `fix:`, `docs:`…).  
3. Pull Request hacia `main`.

---

## Licencia

MIT © 2025 Jose Pupo
