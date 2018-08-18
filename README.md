# DDD Entity Hydration Proxy

This project is a sample intended to show how entities can be hydrated by not using at all written setter methods. This method helps keeping the entities without unnecessary setters, which is an aid to prevent anemic models.

Hydrator classes are used in order to decouple from the entity the hydration process. This way also, multiple types of hydration can be implemented on every single entity.

The project is written using Domain Driven Design. It simulates a blog post + comments structure to be able to have some entities to hydrate. The use case to read all posts is the only one implemented as a demo.

## Running the project
1. Download all necessary libraries using the `composer up` command.
2. Run the application by executing:
```
php bin/run.php posts:all
```