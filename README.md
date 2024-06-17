grin-symfony/web-app-bundle
========

# Description

This bundle provides ready to use traits for Doctrine (also listen prePersist and preUpdate):
| FQCN |
| ------------- |
| [\GS\WebApp\Trait\Doctrine\UpdatedAt](https://github.com/grin-symfony/web-app-bundle/blob/main/src/Trait/Doctrine/UpdatedAt.php) |
| [\GS\WebApp\Trait\Doctrine\CreatedAt](https://github.com/grin-symfony/web-app-bundle/blob/main/src/Trait/Doctrine/CreatedAt.php) |

# Installation

### Step 1: Require the bundle

In your `%kernel.project_dir%/composer.json`

```json
"require": {
	"grin-symfony/web-app-bundle": "VERSION"
},
"repositories": [
	{
		"type": "path",
		"url": "./bundles/grin-symfony/web-app-bundle"
	}
]
```

### Step 2: Download the bundle

### [Before git clone](https://github.com/grin-symfony/docs/blob/main/docs/bundles_grin_symfony%20mkdir.md)

```console
git clone "https://github.com/grin-symfony/web-app-bundle.git"
```

```console
cd "../../"
```

```console
composer require "grin-symfony/web-app-bundle"
```

### [Binds](https://github.com/grin-symfony/docs/blob/main/docs/borrow-services.yaml-section.md)

### Step 3: Usage

Use CreatedAt and UpdatedAt traits
------

```php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YourEntityRepository::class)]
class YourEntity {

	// PrePersistEventLisener OF THIS BUNDLE WILL EXECUTE setCreatedAt METHOD FOR YOU
	use \GS\WebApp\Trait\Doctrine\UpdatedAt;

	// PreUpdateEventLisener OF THIS BUNDLE WILL EXECUTE setUpdatedAt METHOD FOR YOU
	use \GS\WebApp\Trait\Doctrine\CreatedAt;
	
	//...
}

```

You can configure the behaviour of the listeners in `%kernel.project_dir%/config/services.yaml%`:

```yaml
parameters:
    ###> GS\WebApp ###
    gs_web_app.doctrine:
        pre_persist_for_created_at_event_listener:
            is_listen: true
            priority: 0
            connection: 'default'
        pre_update_for_updated_at_event_listener:
            is_listen: true
            priority: 0
            connection: 'default'
    ###< GS\WebApp ###
```

Or configure with bundle overriding `%kernel.project_dir%/config/packages/gs_web_app.yaml%`:

```yaml
gs_web_app:
    
    doctrine:
        pre_persist_for_created_at_event_listener:
            is_listen: true
            priority: 0
            connection: 'default'
        pre_update_for_updated_at_event_listener:
            is_listen: true
            priority: 0
            connection: 'default'
```

For more information of configuration execute:

```console
php.exe ./bin/console config:dump-reference gs_web_app
```

Or

```console
php bin/console config:dump-reference gs_web_app
```




