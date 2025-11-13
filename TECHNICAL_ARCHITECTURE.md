## Technical Architecture Plan for DHOA Portal

### 1. Core Principles
*   **Modularity**: Design the application as a collection of loosely coupled modules/microservices.
*   **Scalability**: Ensure the architecture can handle millions of billboard listings and users, with future pan-African expansion.
*   **Security**: Implement robust security measures including KYC, 2FA, encryption, and fraud detection.
*   **API-First**: All interactions between modules and external services will be via well-defined APIs.
*   **Cloud-Native**: Leverage cloud services (AWS/Azure) for hosting, scalability, and managed services.

### 2. High-Level Architecture

```
+-----------------------+
|     Client Devices    |
| (Web Portal, iOS, Android)|
+-----------+-----------+
            |
            | (HTTP/S)
            |
+-----------+-----------+
|      API Gateway      |
| (Load Balancer, WAF)  |
+-----------+-----------+
            |
            | (Internal API Calls)
            |
+-----------+-----------+
|   Laravel Application |
| (Core Services, API Endpoints)|
+-----------+-----------+
            |
            | (Message Queue, Direct Calls)
            |
+-----------+-----------+
|    Microservices/Modules   |
| (e.g., Auth, Inventory, Payments, Compliance, Analytics)|
+-----------+-----------+
            |
            | (Database Connections)
            |
+-----------+-----------+
|      Databases        |
| (SQL, NoSQL, Caching) |
+-----------+-----------+
            |
            | (External APIs)
            |
+-----------+-----------+
|   External Services   |
| (APCON, LASAA, Payment Gateways, GIS, WhatsApp)|
+-----------------------+
```

### 3. Laravel Application Structure

The existing Laravel application will serve as the core API gateway and host foundational services. We will extend it to support modularity.

*   **Core Laravel**: Handle routing, authentication (initial layer), and serve as the entry point for all requests.
*   **Modules**: Each major functional area (e.g., User Management, Billboard Inventory, Payments, Compliance, Analytics) will be developed as a distinct module within the Laravel application or as separate microservices.

#### Proposed Directory Structure for Modules (within `app/`)

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   ├── Billboard/
│   │   ├── Payment/
│   │   └── ...
├── Models/
│   ├── User.php
│   ├── Billboard.php
│   ├── Payment.php
│   └── ...
├── Providers/
│   └── AppServiceProvider.php
├── Services/             # Business logic for each module
│   ├── AuthService.php
│   ├── BillboardService.php
│   ├── PaymentService.php
│   └── ...
├── Repositories/          # Data access layer
│   ├── UserRepository.php
│   ├── BillboardRepository.php
│   ├── PaymentRepository.php
│   └── ...
├── Interfaces/           # Contract for services and repositories
│   ├── AuthInterface.php
│   ├── BillboardInterface.php
│   └── ...
├── Exceptions/
├── Events/
├── Listeners/
├── Jobs/
├── Console/
└── ...
```

### 4. Key Architectural Components

#### 4.1. Authentication & Authorization
*   **Laravel Sanctum**: For API token authentication for mobile and web clients.
*   **Role-Based Access Control (RBAC)**: Implement roles (LOAP, Advertiser, Regulator, Service Provider, Admin) and permissions using a package like Spatie Laravel Permission.
*   **KYC/2FA**: Integrate third-party services for Know Your Customer (KYC) and Two-Factor Authentication (2FA).

#### 4.2. Billboard Inventory Management
*   **Dedicated Module**: A separate module/service to manage billboard data, availability, and search.
*   **GIS Integration**: Integrate with GIS services for map-based search, geo-intelligence, traffic data, and points of interest overlays.
*   **Search Engine**: Utilize Elasticsearch or a similar solution for efficient and advanced billboard searching.

#### 4.3. Marketplace & Engagement Hub
*   **Booking System**: Implement a robust booking system with availability calendars.
*   **Service Provider Matching**: Logic for connecting LOAPs with service providers (consultants, engineers, installers, graphic designers, printers, LED operators).
*   **Communication Layer**: Integrate in-app chat and WhatsApp messaging (using a service like Twilio or a direct WhatsApp Business API).

#### 4.4. Payments & Monetization
*   **Payment Gateway Integration**: Support multiple payment channels (cards, bank transfers, wallets) via local payment gateways.
*   **Escrow System**: Implement an escrow system to ensure secure transactions and build trust.
*   **Commission Engine**: Develop a flexible commission system for transactions and paid advertisements.
*   **Subscription Management**: Handle freemium to enterprise tiers for different user types.

#### 4.5. Compliance & Approvals
*   **Regulatory Dashboard**: A dedicated module for regulators to verify licenses, approve/reject content, and monitor campaigns.
*   **APCON/LASAA Integration**: Direct API integration with regulatory bodies for real-time license cross-checking and approval workflows.
*   **Blacklisting/Delisting**: System for managing non-compliant entities.

#### 4.6. Analytics & Reporting
*   **Data Warehouse**: Centralized data store for analytics.
*   **Reporting Dashboards**: Develop dashboards for campaign performance, occupancy rates, financial metrics, and regulatory insights.
*   **AI-Driven Insights**: Future integration for demand forecasting, dynamic pricing, and carbon tracking.

### 5. Database Schema Considerations
*   **Relational Database (MySQL/PostgreSQL)**: For core transactional data (Users, Billboards, Bookings, Payments, etc.).
*   **NoSQL Database (MongoDB/Redis)**: Potentially for caching, session management, or specific unstructured data needs.

### 6. API Specifications
*   Define clear API contracts (OpenAPI/Swagger) for all internal and external APIs.
*   Implement API versioning.

### 7. Deployment Strategy
*   **Containerization**: Use Docker for consistent environments.
*   **Orchestration**: Kubernetes for managing containerized applications in a cloud environment.
*   **CI/CD**: Implement Continuous Integration and Continuous Deployment pipelines for automated testing and deployment.

### 8. Security Considerations
*   **Input Validation**: Strict validation on all user inputs.
*   **Data Encryption**: Encrypt sensitive data at rest and in transit.
*   **Regular Security Audits**: Conduct periodic security audits and penetration testing.
*   **Rate Limiting**: Protect APIs from abuse.

### Asset Management

All public assets, including images (e.g., logos), CSS, and JavaScript files, will be stored in the `public` directory. Specifically, images will reside in `public/images`.

This technical architecture plan provides a foundational understanding for the development of the DHOA Portal. The next step will be to translate this into detailed database schemas and API specifications.