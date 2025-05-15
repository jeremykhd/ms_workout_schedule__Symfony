# Workout Service

Ce service fait partie d'une architecture microservices et gère les exercices de musculation. Il est développé avec Symfony et utilise une architecture CQRS (Command Query Responsibility Segregation).

## 🚀 Technologies

- PHP 8.2
- Symfony 6.x
- MySQL 8.0
- Docker & Docker Compose
- RabbitMQ (pour la communication entre services)
- Nginx
- OpenAPI/Swagger pour la documentation API
- GitHub Actions pour la CI/CD

## 📋 Prérequis

- Docker
- Docker Compose
- Composer (pour le développement local)

## 🛠 Installation

1. Cloner le repository :

```bash
git clone [URL_DU_REPO]
cd workout
```

2. Configurer les variables d'environnement :

```bash
cp .env .env.local
```

Modifier les variables dans `.env.local` selon votre environnement.

3. Démarrer les services avec Docker :

```bash
docker-compose up -d
```

## 🏗 Structure du Projet

```
workout/
├── src/
│   ├── Core/
│   │   ├── Application/
│   │   │   ├── Controller/
│   │   │   ├── Model/
│   │   │   └── Service/
│   │   ├── Domain/
│   │   │   ├── Entity/
│   │   │   └── Repository/
│   │   └── Infrastructure/
│   │       └── Repository/
│   └── ...
├── docker/
│   └── nginx/
├── .github/
│   └── workflows/
│       └── ci-cd.yml
├── public/
├── tests/
├── .env
├── .env.local
├── composer.json
├── docker-compose.yml
└── Dockerfile
```

## 🚀 Démarrage Rapide

1. Démarrer les services :

```bash
docker-compose up -d
```

2. Installer les dépendances :

```bash
docker-compose exec php composer install
```

3. Créer la base de données :

```bash
docker-compose exec php bin/console doctrine:database:create
docker-compose exec php bin/console doctrine:migrations:migrate
```

4. L'API sera accessible sur : `http://localhost:8000`

## 📚 Documentation API

La documentation de l'API est disponible via Swagger UI :

- URL : `http://localhost:8000/api/doc`

### Endpoints Principaux

- `GET /api/exercises` : Liste tous les exercices
- `GET /api/exercise/{id}` : Récupère un exercice spécifique

## 🧪 Tests

Pour exécuter les tests localement :

```bash
docker-compose exec php bin/phpunit
```

## 🔄 CI/CD

Le projet utilise GitHub Actions pour l'intégration et le déploiement continus. Le workflow comprend :

1. **Tests** :

   - Exécution des tests unitaires
   - Couverture de code avec Xdebug
   - Base de données MySQL pour les tests

2. **Qualité du Code** :

   - Analyse statique avec PHPStan
   - Vérification du style de code avec PHP CS Fixer

3. **Build et Déploiement** :
   - Construction de l'image Docker
   - Push vers DockerHub (uniquement sur la branche main)

Pour configurer la CI/CD :

1. Ajouter les secrets suivants dans les paramètres GitHub :

   - `DOCKERHUB_USERNAME` : Votre nom d'utilisateur DockerHub
   - `DOCKERHUB_TOKEN` : Votre token d'accès DockerHub

2. Le workflow se déclenche automatiquement sur :
   - Push sur la branche main
   - Pull requests vers la branche main

## 🔄 Communication avec d'autres Services

Le service communique avec d'autres microservices via RabbitMQ. La configuration de la connexion se trouve dans le fichier `.env` :

```
MESSENGER_TRANSPORT_DSN=amqp://guest:guest@rabbitmq:5672/%2f
```

## 📦 Déploiement

1. Construire l'image Docker :

```bash
docker-compose build
```

2. Démarrer les services :

```bash
docker-compose up -d
```

## 🔍 Monitoring

- Logs Nginx : `docker-compose logs nginx`
- Logs PHP : `docker-compose logs php`
- Logs MySQL : `docker-compose logs mysql`

## 🤝 Contribution

1. Fork le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📝 License

[Votre Licence]

## 👥 Auteurs

- [Votre Nom] - _Travail initial_

## 🙏 Remerciements

- Symfony
- Docker
- RabbitMQ
- GitHub Actions
