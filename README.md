
# Myshop rest api






## Installation

Install my-project with composer

```bash
  cd project 
  composer install
  create db and test_db
  php migrate:fresh --seed
```
Run test
```bash
  php migrate:test
```

## API Reference

#### Get all categories

```http
  GET /api/categories
```

# Category
#### Get category

```http
  GET /api/categories/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of category to fetch |


#### Store category

```http
  POST /api/categories
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. name of category to store |
| `parent_id` | `string` | **Not Required**. parent id of category |

#### Update category

```http
  PUT /api/categories/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. name of category to update |

#### Delete category

```http
  DELETE /api/categories/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of category to delete |

# Products
#### Get all Products

```http
  GET /api/products
```

#### Get product

```http
  GET /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of product to fetch |


#### Store product

```http
  POST /api/products
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. name of product to store |
| `price`      | `string` | **Required**. price of product to store |
| `description`      | `string` | **Required**. description of product to store |
| `status`      | `string` | **Required**. status of product to store |
| `image`      | `string` | **Not Required**. image of product to store |
| `category_id` | `string` | **Required**. category id of product |

#### Update product

```http
  PUT /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Not Required**. name of product to store |
| `price`      | `string` | **Not Required**. price of product to store |
| `description`      | `string` | **Not Required**. description of product to store |
| `status`      | `string` | **Not Required**. status of product to store |
| `image`      | `string` | **Not Required**. image of product to store |
| `category_id` | `string` | **Not Required**. category id of product |

#### Delete product

```http
  DELETE /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of product to delete |