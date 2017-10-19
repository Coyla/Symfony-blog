Blog
====

Info
----
### Objective
Create a blog to share my writing with others.

### Scoring
Maintainability: 2,5/20
MVP: 10/20
Bonus features: 7,5/20

Do not only execute what is asking, be creative and challenge yourself to reach the objective.

Maintainability
---------------
* Respect Symfony Best Practices
* Respect PSR and Symfony Coding Style
* Atomic commits

MVP User Stories
----------------
### As a user I can see a homepage
#### Help
* Use the Symfony Installer to create a new project

### As an admin I can login into the application
#### Help
* Use the `app/config/security.yml` to configure the security

### As an admin I can access to the `/admin` section
#### Help
* Use the security `access_control` configuration

### As a user I can not access to the `/admin` section
#### Help
* Use the security `access_control` configuration

### As an admin I can create a blog post on the `/admin/posts/new` page
#### BlogPost
`title`, `content`, `published_at`

#### Help
* Create an BlogPost Entity
* Create an BlogPost Form Type

### As an admin I can view the list of all the blog post on the `admin/posts` page
#### Help
* Use the BlogPost Repository

### As an user I can view the list of all the blog post on the homepage
#### List elements
Display the `title`, the `published_at`, and only the first 100 char of the `content`.
#### Help
* Use the BlogPost Repository

### As an user I can view the detail of a blog post on a `/posts/{id}` page

### As an admin I can mark a blog post as published
#### Help
* Add a default value `null` to the BlogPost Entity
* Add a button to publish an article by setting the value of the `published_at` attribute

### As a user I cannot see the blog post not published yet

Bonus features User Stories
---------------------------
### As a user I can see the use of a front-end framework

### As a user I can comment a blog post

### As a user I see the comments of blog post

### As a user I can see the number of comments of blog post on the homepage

### As an admin I can remove a comment
