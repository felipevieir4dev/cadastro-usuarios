# Diretório Database

Este diretório contém arquivos relacionados ao banco de dados do projeto.

## Arquivos

- `schema.sql`: Script SQL com a estrutura do banco de dados
  - Criação do banco de dados
  - Criação das tabelas
  - Índices e constraints

## Como usar

Para criar o banco de dados e suas tabelas, execute:

```bash
mysql -u root -p < schema.sql
```

## Backup

Para fazer backup do banco de dados:

```bash
mysqldump -u root -p db_usuario > backup_$(date +%Y%m%d).sql
```

## Restauração

Para restaurar um backup:

```bash
mysql -u root -p db_usuario < backup_YYYYMMDD.sql
```
