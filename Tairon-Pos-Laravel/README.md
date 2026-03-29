# Tairon POS – Sistema inteligente de gestión comercial

Tairon POS es un sistema de punto de venta diseñado para gestionar operaciones comerciales de forma organizada, clara y escalable. Está enfocado en resolver necesidades reales del negocio como el control de productos, clientes, proveedores y la preparación para flujos más complejos como ventas, créditos y caja.

---

## Descripción

Muchos sistemas POS tradicionales se enfocan únicamente en registrar ventas, dejando de lado aspectos importantes como la organización del sistema, la escalabilidad y la adaptabilidad.

Tairon POS se construye con una base estructurada que permite crecer progresivamente sin perder orden ni control.

---

## Enfoque del sistema

El sistema está pensado bajo principios prácticos:

* Organización por dominios del negocio
* Separación clara de responsabilidades
* Control de datos sin eliminación física
* Base preparada para futuras funcionalidades (ventas, créditos, caja)
* Adaptabilidad para distintos tipos de negocio
* Crecimiento progresivo junto al negocio o empresa

---

## Arquitectura

El proyecto organiza su lógica por dominios dentro de la estructura de Laravel, manteniendo compatibilidad con el framework y mejorando la claridad del sistema.

```bash
app/
├── Http/
│   └── Controllers/
│       ├── Cash/
│       ├── Categories/
│       ├── Customers/
│       ├── Inventory/
│       ├── Products/
│       ├── Purchases/
│       ├── Sales/
│       ├── Settings/
│       └── Suppliers/
│
├── Models/
│   ├── Cash/
│   ├── Categories/
│   ├── Customers/
│   ├── Inventory/
│   ├── Products/
│   ├── Purchases/
│   ├── Sales/
│   ├── Settings/
│   ├── Suppliers/
│   └── Users/
│
└── Routes/
    ├── Cash/
    ├── Categories/
    ├── Customers/
    ├── Inventory/
    ├── Products/
    ├── Purchases/
    ├── Sales/
    ├── Settings/
    └── Suppliers/
```

Esta organización mantiene coherencia entre modelos, controladores y rutas, agrupando cada parte del sistema por dominio y facilitando el mantenimiento y la escalabilidad.

---

## Funcionalidades actuales

### Productos

* Registro y gestión de productos
* Activación y desactivación lógica (sin eliminación)

### Clientes

* Gestión de clientes
* Organización de información

### Proveedores

* Registro y control de proveedores

### Inventario

* Estructura base para control de stock

---

## Principios del sistema

Nada se elimina, todo se controla.

El sistema utiliza desactivación lógica (`active`) para preservar el historial y mantener la integridad de los datos.

---

## Estado del proyecto

El sistema se encuentra en desarrollo activo.

Actualmente incluye:

* Estructura organizada por dominios
* Gestión de productos, clientes y proveedores
* Control lógico de activación de registros

En desarrollo:

* Módulo de ventas
* Sistema de créditos y pagos
* Integración de caja

---

## Objetivo

Desarrollar un sistema POS robusto, adaptable y preparado para evolucionar junto al negocio, permitiendo que crezca sin necesidad de cambiar de sistema a medida que aumentan sus necesidades.
