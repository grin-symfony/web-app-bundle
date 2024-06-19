grin-symfony/web-app-bundle
========

This bundle was created for Symfony Web applications
<br>
Provides helpers for it

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


# First view

This bundle provides ready to use traits for Doctrine (also listen prePersist and preUpdate)
------

| FQCN |
| ------------- |
| [\GS\WebApp\Trait\Doctrine\UpdatedAt](https://github.com/grin-symfony/web-app-bundle/blob/main/src/Trait/Doctrine/UpdatedAt.php) |
| [\GS\WebApp\Trait\Doctrine\CreatedAt](https://github.com/grin-symfony/web-app-bundle/blob/main/src/Trait/Doctrine/CreatedAt.php) |

Deploy helper
------

Execute in your `%kernel.project_dir%`:

```console
php bin/console a:i
```

As you can see some files were appeared by the path:
`%kernel.project_dir%/public/bundles/gswebapp`

Execute in your app:
```console
cp "./public/bundles/gswebapp/deploy" "./public/deploy" -pr
```

### see the content of: `%kernel.project_dir%/public/deploy/*` files (change if you need)

Create `%kernel.project_dir%/init.sh` by executing:
```console
echo 'bash "./public/deploy/install-bundles.sh"' > "./init.sh"
```

### always execute `./init.sh` from `%kernel.project_dir%`

When you execute the following command it'll help you to install all the bundles you described in the `%kernel.project_dir%/public/deploy/install-bundles.sh`
```console
bash "./init.sh"
```

Alternatively, do the same:
```console
./init.sh
```

# Usage

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

You can configure the behaviour of the bundle in the `%kernel.project_dir%/config/packages/gs_web_app.yaml%`:

```yaml
gs_web_app:
    
    doctrine:
        pre_persist_for_created_at_event_listener:
            is_listen: false
            priority: 110
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




