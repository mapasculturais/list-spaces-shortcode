# list-spaces-shortcode
Shortcode for WordPress to list spaces retrieved using the Mapas Culturais API

# Como usar

Para listar espaços denro de uma página ou post utilize o shortcode "list_spaces" com atributos e valores para filtrar o resultado.

Exemplo:

```
[list_spaces atributo=valor]
```

## Opções de filtro

### Por tag

```
[list_spaces tag=plandecirculacion]
```

### Por departamento

```
[list_spaces departamento=Montevideo]
```

### Por IDs

Uma lista de IDs separadas por vírugla, sem espaços

```
[list_spaces ids="101,239,344,355"]
```

### Por tipo de espaço

O ID do tipo

```
[list_spaces type=30]
```

consulte os ids dos tipo em: https://github.com/mapasculturais/mapasculturais/blob/develop/src/protected/application/conf/space-types.php

### Combinando filtros

É possível combinar os filtros

```
Retorna os teatros de montevideo com a tag plandecirculacion
[list_spaces type=30 departamento=Montevideo tag=plandecirculacion]
```
