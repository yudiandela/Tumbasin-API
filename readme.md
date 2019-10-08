<p align="center"><img src="https://app.tumbasin.id/tumbasin_logo.png" width="150"></p>

## Akses Category
#### Mengambil data seluruh category
```
method : GET
Url : /category
```
#### Menambahkan data category
```
method : POST
Url : /category
Params :
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
```
#### Mengubah data category
```
method : PUT atau PATCH
Url : /category/{category_id}
Params : 
'id'    => ['required', 'numeric']
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
```
#### Menghapus data category
```
method : DELETE
Url : /category/{category_id}
Params : 
'id'    => ['required', 'numeric']
```

## Akses Brand
#### Mengambil data seluruh brand
```
method : GET
Url : /brand
```
#### Menambahkan data brand
```
method : POST
Url : /brand
Params : 
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
```
#### Mengubah data brand
```
method : PUT atau PATCH
Url : /brand/{brand_id}
Params : 
'id'    => ['required', 'numeric']
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
```
#### Menghapus data brand
```
method : DELETE
Url : /brand/{brand_id}
Params : 
'id' => ['required', 'numeric']
```

## Akses Product
#### Mengambil data seluruh product
```
method : GET
Url : /product
```
#### Menambahkan data product
```
method : POST
Url : /product
Params : 
'name'        => ['required', 'string', 'max:255']
'description' => ['required', 'string']
'image'       => ['required', 'string']
'price'       => ['required', 'numeric']
'unit'        => ['required', 'string']
'stock'       => ['required', 'numeric']
'weight'      => ['required', 'string']
'length'      => ['required', 'string']
'width'       => ['required', 'string']
'height'      => ['required', 'string']
```
#### Mengubah data product
```
method : PUT atau PATCH
Url : /product/{product_id}
Params : 
'id'          => ['required', 'numeric']
'name'        => ['required', 'string', 'max:255']
'description' => ['required', 'string']
'image'       => ['required', 'string']
'price'       => ['required', 'numeric']
'unit'        => ['required', 'string']
'stock'       => ['required', 'numeric']
'weight'      => ['required', 'string']
'length'      => ['required', 'string']
'width'       => ['required', 'string']
'height'      => ['required', 'string']
```
#### Menghapus data product
```
method : DELETE
Url : /product/{product_id}
Params : 
'id' => ['required', 'numeric']
```
