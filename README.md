# Szallas.hu Backend feladat

- RDBMS: MariaDB 10.6.12
- Laravel verzió: 8.75
- PHP verzió: 7.4

## Docker konténerek

- Webszerver
  - port: 8018


- Adatbázis
    - port: 3328
    - user: root
    - jelszó: nincs


## Api

Az API a [Laravel JSON:API](https://laraveljsonapi.io/docs/3.0/) [json:api](https://jsonapi.org/) implementációra épül, a feladatban meghatározott feature-ök minimális (működőképes) megvalósítása.

### Api Végpontok

#### GET `[GET] /api/V1/companies/{id}`

Példa egy resource elkérésre:
```bash
curl http://localhost:8018/api/v1/companies/1  -H 'Accept: application/vnd.api+json'
```

Példa több resource elkérésre azonosítók alapján:
```bash
curl 'http://localhost:8018/api/v1/companies?filter\[id\]=1,2,3' -H  'Content-Type: application/vnd.api+json'  -H 'Accept: application/vnd.api+json'
```

#### CREATE `[POST] /api/V1/companies`

Példa:

```bash
curl http://localhost:8018/api/v1/companies -H 'Content-Type: application/vnd.api+json' -X POST  -H 'Accept: application/vnd.api+json' -d "{\"data\":{\"type\": \"companies\", \"attributes\": {\"companyName\":\"Cégnév\",\"companyRegistrationNumber\":\"1111-1111\",\"companyFoundationDate\":\"2006.05.01\",\"country\":\"Hungary\",\"zipCode\":\"1013\",\"city\":\"Budapest\",\"streetAddress\":\"Árpád Fejedelem útja 11.\",\"latitude\":\"0.0\",\"longitude\":\"-0.0\",\"companyOwner\":\"Gipsz Jakab\",\"employees\":35,\"activity\":\"IT\",\"active\":true,\"email\":\"info@ecom.hu\",\"password\":\"abrakadabra\"   }}}"
```

#### UPDATE `[PATCH] /api/V1/companies/{id}`


## SQL lekérdezések

A feladatban kért kettő SQL lekérdezés a forráskód `/sql` könyvtában található:

1. [cégnevek kimutatása activity szerint](sql/pivot_activity.sql)
2. [cégalapítás kimutatás](sql/foundation_date_sequence.sql)


