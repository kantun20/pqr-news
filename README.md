# PQR News

PQR News es un theme clásico de WordPress desarrollado en PHP para un sitio de noticias. Su objetivo es servir como base limpia y mantenible para portadas, archivos, búsquedas, páginas, noticias individuales, sidebar y comentarios.

Este proyecto es un **classic theme** de WordPress. No es un block theme, no usa `theme.json` y no depende del editor de sitio completo.

## Requisitos

- WordPress 6+
- PHP 8+
- Local WP recomendado para desarrollo local
- Git para control de versiones

## Estructura

```text
pqr-news/
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── images/
│   └── js/
├── inc/
├── template-parts/
│   └── content.php
├── 404.php
├── archive.php
├── comments.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── search.php
├── sidebar.php
├── single.php
└── style.css
```

## Archivos principales

- `style.css`: metadata obligatoria del theme y estilos mínimos base.
- `functions.php`: setup del theme, soporte de features, menús, sidebar y carga de estilos.
- `header.php` / `footer.php`: estructura global del documento.
- `index.php`: portada/listado principal de noticias.
- `single.php`: vista individual de una noticia.
- `archive.php`: listados por categoría, etiqueta, autor y fecha.
- `search.php`: resultados de búsqueda.
- `page.php`: páginas estáticas.
- `comments.php`: listado y formulario de comentarios.
- `template-parts/content.php`: tarjeta reutilizable para posts.
- `assets/css/main.css`: layout y estilos visuales del theme.

## Instalación local con symlink

1. Crea o abre un sitio en Local WP.
2. Localiza la carpeta de themes del sitio:

```bash
cd "/ruta/a/tu-sitio/app/public/wp-content/themes"
```

3. Crea un symlink hacia este repositorio:

```bash
ln -s "/Users/juan/Downloads/wp-themes/pqr-news" pqr-news
```

4. En el panel de WordPress, ve a **Apariencia > Temas**.
5. Activa **PQR News**.

Si el theme no aparece, revisa que el symlink apunte a la carpeta que contiene `style.css` e `index.php`.

## Flujo de desarrollo con Git

Trabaja los cambios en ramas pequeñas y con commits descriptivos.

```bash
git status
git checkout -b feature/nombre-del-cambio
git add .
git commit -m "Describe el cambio realizado"
```

Antes de cerrar una tarea, revisa el estado del repositorio:

```bash
git status
```

Para cambios de PHP, valida sintaxis cuando aplique:

```bash
php -l functions.php
php -l index.php
```

## Notas de desarrollo

- Mantener el theme como clásico en PHP.
- No agregar `theme.json` salvo que se decida migrar a block theme.
- No agregar frameworks CSS por ahora.
- Mantener textos visibles preparados para traducción con el text domain `pqr-news`.
- Mantener componentes reutilizables dentro de `template-parts/`.
