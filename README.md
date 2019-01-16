# Monitoring
This project defines a common interface to be able to monitor you application. It has an adapter ready to be used, but feel free to use or add any adapter you need.

## How to use it with Symfony
There is a bundle extension that will automatically create a monitor definition in the dependency injection container.
You just need to add `IPresence\Monitoring\Symfony\MonitoringBundle::class` in your bundles.php file and this will load the `monitoring.yaml` config located inside `config/packages/`. You can see an example of configuration [here](config/sample.yaml)

## Development environment
To build the test environment you'll need docker and docker-compose installed:
```
make dev
```

### Running the tests
```bash
make test
```
You can run the tests only for a php version like this
```bash
make unit PHP_VERSION=7.3
```

### Stop the environment
```
make nodev
```

### Delete the environment
You can delete the docker images for a total clean-up
```bash
 make nodev IMAGES=true
```
