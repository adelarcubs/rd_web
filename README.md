# Web sample

This is just a simple sample to show how the JS track will work

## Run local

Just a couple of commands. Running this commands the api application will be on localhost:8080

```
docker-compose up -d --build
docker-compose run zf ./vendor/bin/doctrine orm:schema-tool:update --force
```

### Enable development mode

```
composer development-enable
```
