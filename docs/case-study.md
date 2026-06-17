# Case Study — ERP SKALA UMKM

## Summary

ERP SKALA UMKM is a mobile-first ERP project designed for Indonesian small businesses that need a more structured way to manage sales, inventory, cash flow, customer orders, and payroll.

The project started from a practical observation: many small businesses do not need a complex enterprise ERP on day one. They need a system that helps them record daily operations consistently and understand business health without requiring accounting expertise.

## Business Problem

Common problems found in MSME operations:

1. Sales are recorded, but profit is unclear.
2. Stock movement is not visible in real time.
3. Purchase, sales, and cash records are separated.
4. Customer receivables are often tracked manually.
5. Payroll is not connected to cash movement.
6. Owners need simple summaries, not complicated accounting screens.

## Product Direction

The project focuses on a practical MVP:

- manual-first transaction input,
- mobile-first daily operations,
- clear posting flow,
- simple finance summary,
- inventory visibility,
- customer order tracking,
- HRM and payroll foundation.

AI/OCR is planned as a future acceleration layer, not the primary foundation. Manual entry remains the fallback path.

## Core Modules

### 1. POS & Inventory

- sales draft creation,
- cart calculation,
- sale posting,
- stock reduction,
- receipt display,
- product and stock list,
- stock movement history.

### 2. Finance & Accounting

- cash account summary,
- cash book,
- income and expense transaction,
- journal engine,
- simple profit/loss report,
- receivable and payable support.

### 3. CRM

- customer data,
- customer order draft,
- down payment recording,
- order conversion to sale,
- receivable visibility.

### 4. HRM & Payroll

- employee data,
- payroll run,
- salary payment,
- payroll summary.

## Engineering Challenges

### Multi-module consistency

The system must keep sales, inventory, finance, and accounting behavior consistent. A posted sale is not just a sales record; it may affect stock, cash, receivable, revenue, and cost of goods sold.

### Mobile usability

The system needs to remain usable for non-technical users. This means the interface should avoid exposing accounting complexity too early.

### Multi-tenant safety

Each business must only access its own data. Tenant context must be enforced in backend queries and business workflows.

### Progressive product maturity

The first goal is functional correctness. UX simplification and productization come after the ERP core is stable.

## Technical Approach

- Flutter mobile app as the primary user interface.
- Laravel REST API as the backend.
- MySQL/MariaDB as the main database.
- API-first architecture to support future web admin.
- Role-based access for owner and staff.
- Controlled posting services for business transactions.
- Regression checklist for critical workflows.

## Result

The project has reached a functional MVP direction with core workflows across POS, inventory, finance, CRM, and payroll. It is now suitable as a technical portfolio case study because it demonstrates more than UI slicing: it shows business process understanding, backend architecture, mobile integration, and documentation discipline.

## What this project demonstrates

- Ability to model real business workflows.
- Ability to build Flutter apps connected to real APIs.
- Ability to design Laravel APIs for multi-module systems.
- Ability to think beyond screens and into operational correctness.
- Ability to document decisions, scope, and trade-offs.
