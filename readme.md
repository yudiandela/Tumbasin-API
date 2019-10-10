<p align="center"><img src="https://app.tumbasin.id/tumbasin_logo.png" width="150"></p>

# Tumbasin API

Demo => https://tumbasin-api.herokuapp.com 

## Akses Category
#### Mengambil data seluruh category
```
METHOD : GET
URL    : /category
CONTOH : https://tumbasin-api.herokuapp.com/category
```
Hasil :
```
[
  {
    "id": 1,
    "name": "SAYURAN",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
  },
  {
    "id": 2,
    "name": "JAJANAN",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_jajanpasar1.png"
  },
  {
    "id": 3,
    "name": "SEMBAKO",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
  },
  {
    "id": 4,
    "name": "LAUK PAUK",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_daging1.png"
  },
  {
    "id": 5,
    "name": "BUAH",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_buah1.png"
  },
  {
    "id": 6,
    "name": "SEAFOOD",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_seafood1.png"
  },
  {
    "id": 7,
    "name": "BUMBU",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_bumbu1.png"
  }
]
```
#### Menambahkan data category
```
METHOD : POST
URL    : /category
PARAMS : 
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
CONTOH : https://tumbasin-api.herokuapp.com/category
```
Hasil :
``` 
[
  {
    "id": 8,
    "name": "TAMBAH CATEGORY",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_tambah_category.png"
  }
]
```
#### Mengubah data category
```
METHOD : PUT atau PATCH
URL    : /category/{category_id}
PARAMS : 
'id'    => ['required', 'numeric']
'name'  => ['required', 'string', 'max:255']
'image' => ['optional', 'string']
CONTOH : https://tumbasin-api.herokuapp.com/category/1
```
Hasil :
```
[
  {
    "id": 8,
    "name": "UBAH CATEGORY",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_ubah_category.png"
  }
]
```
#### Menghapus data category
```
METHOD : DELETE
URL    : /category/{category_id}
PARAMS : 
'id'    => ['required', 'numeric']
CONTOH : https://tumbasin-api.herokuapp.com/category/1
```
Hasil :
```
[
  {
    "message": "deleted"
  }
]
```

## Akses Brand
#### Mengambil data seluruh brand
```
METHOD : GET
URL    : /brand
CONTOH : https://tumbasin-api.herokuapp.com/brand
```
Hasil :
```
[
  {
    "id": 1,
    "name": "NESTLE",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
  },
  {
    "id": 2,
    "name": "AJINOMOTO",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png"
  },
  {
    "id": 3,
    "name": "SASA",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
  },
  {
    "id": 4,
    "name": "INDOFOOD",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_indofood.png"
  }
]
```
#### Menambahkan data brand
```
METHOD : POST
URL    : /brand
PARAMS : 
'name'  => ['required', 'string', 'max:255']
'image' => ['required', 'string']
CONTOH : https://tumbasin-api.herokuapp.com/brand
```
Hasil :
```
[
  {
    "id": 5,
    "name": "TAMBAH BRAND",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_tambah_brand.png"
  }
]
```
#### Mengubah data brand
```
METHOD : PUT atau PATCH
URL    : /brand/{brand_id}
PARAMS : 
'id'    => ['required', 'numeric']
'name'  => ['required', 'string', 'max:255']
'image' => ['optional', 'string']
CONTOH : https://tumbasin-api.herokuapp.com/brand/1
```
Hasil :
```
[
  {
    "id": 5,
    "name": "UBAH BRAND",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ubah_brand.png"
  }
]
```
#### Menghapus data brand
```
METHOD : DELETE
URL    : /brand/{brand_id}
PARAMS : 
'id' => ['required', 'numeric']
CONTOH : https://tumbasin-api.herokuapp.com/brand/1
```
Hasil :
```
[
  {
    "message": "deleted"
  }
]
```

## Akses Product
#### Mengambil data seluruh product
```
METHOD : GET
URL    : /product
CONTOH : https://tumbasin-api.herokuapp.com/product
```
Hasil :
```
[
  {
    "id": 1,
    "name": "Pala Bubuk",
    "slug": "pala-bubuk",
    "category": {
      "id": 3,
      "name": "SEMBAKO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
    },
    "brand": {
      "id": 3,
      "name": "SASA",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
    },
    "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
    "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
    "price": 39973,
    "unit": "pcs",
    "stock": 93339,
    "weight": 18,
    "length": 16,
    "width": 4,
    "height": 5
  },
  {
    "id": 2,
    "name": "Jahe Besar",
    "slug": "jahe-besar",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Ut occaecati consequatur dolores. Repellendus assumenda sint rerum enim unde. Quas quas sapiente ius...",
    "description": "Ut occaecati consequatur dolores. Repellendus assumenda sint rerum enim unde. Quas quas sapiente iusto nisi sunt maiores tenetur. Vero qui eos enim velit.\n\nEt animi ipsam omnis ipsum aut commodi. Dolor eaque rem non et. Sit aut enim maiores omnis doloribus. Sit optio temporibus neque ullam.\n\nNobis molestiae possimus qui eos eos. Iusto maiores et consequatur quo ut. Nemo magnam quis quia officia. Eveniet quaerat unde fugiat.\n\nAut ipsam possimus aliquam voluptatem perferendis magnam quo. Fuga est possimus odit voluptas voluptatibus dolorem. Aliquam vitae aliquam maxime velit. Consequuntur doloremque quae quae et consequatur voluptatem fugit. Numquam dicta quia fuga optio molestiae et.\n\nIn aperiam nulla qui. Ea quas cum rerum dignissimos dolorum. Est consequatur error quia et aut consequatur. Fugit repellendus ducimus fuga reiciendis temporibus iusto fuga.\n\nPerferendis inventore dolor sunt eos voluptatem minima est. Consequatur et eum et qui est perspiciatis quo. Aut ea ut id.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-pandan-compressor.png",
    "price": 33746,
    "unit": "pcs",
    "stock": 56276,
    "weight": 13,
    "length": 6,
    "width": 6,
    "height": 3
  },
  {
    "id": 3,
    "name": "Temulawak",
    "slug": "temulawak",
    "category": {
      "id": 5,
      "name": "BUAH",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_buah1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Nobis dolor saepe cupiditate. Eos facilis aut sit occaecati sit voluptatem. Saepe beatae sint rerum...",
    "description": "Nobis dolor saepe cupiditate. Eos facilis aut sit occaecati sit voluptatem. Saepe beatae sint rerum et fugit magnam perspiciatis adipisci. Accusamus eum deleniti consequuntur facilis et aliquid laboriosam.\n\nFacilis tempora velit mollitia earum. Est molestias maiores dolore laboriosam ut cupiditate ratione. Est qui rerum repellendus omnis rerum. Velit et non quis tempora. Ratione omnis autem recusandae amet ea praesentium.\n\nEt ipsam eaque sed dolorem. Aut ratione quo ut. Id dolores quam repellat dolor. Non beatae velit et non.\n\nAnimi quae ea blanditiis ea odio. Est quae sit minima quis eveniet. Placeat neque neque mollitia eos. Et impedit officiis temporibus ipsa velit ut aut.\n\nBlanditiis quis neque asperiores occaecati ducimus suscipit aut. Voluptas eligendi molestiae neque consequuntur qui. Saepe aut harum et aut minus laborum.\n\nEt error dolores necessitatibus omnis amet. Odit placeat sunt incidunt et sed. Itaque asperiores odio hic dolores. Voluptas error perspiciatis modi tenetur ut.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-putih-compressor.jpg",
    "price": 96026,
    "unit": "gram",
    "stock": 72549,
    "weight": 6,
    "length": 10,
    "width": 2,
    "height": 3
  },
  {
    "id": 4,
    "name": "Bumbu Bali",
    "slug": "bumbu-bali",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 2,
      "name": "AJINOMOTO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png"
    },
    "short_description": "Perspiciatis vitae dicta sunt ut. Laboriosam repellat dicta ea autem vitae cupiditate totam. Volupta...",
    "description": "Perspiciatis vitae dicta sunt ut. Laboriosam repellat dicta ea autem vitae cupiditate totam. Voluptates hic velit et ut qui vero dolor. Quos quia in assumenda asperiores.\n\nFacilis eius ut aut nisi. Commodi provident quo velit alias. Et nemo blanditiis praesentium perspiciatis est incidunt.\n\nFugit eos minus asperiores vel. Cumque ipsam rerum nam similique.\n\nDolores ex molestiae assumenda repellendus aut. Non minus et omnis laboriosam soluta sunt iure. Qui quisquam facilis dolor rem vel sint. Consequatur mollitia et consequuntur autem voluptas sapiente.\n\nRem eligendi facere dolor possimus. Assumenda eveniet ipsa qui et officia aspernatur reiciendis corporis. Placeat autem mollitia officiis facere laboriosam mollitia. Quo sit quod maxime dolore vel in.\n\nMagni molestias facere ab et voluptatum. Ea assumenda et delectus sit. Dolor quos debitis blanditiis tempore neque incidunt odio.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/merica-bubuk-compressor.png",
    "price": 19645,
    "unit": "pcs",
    "stock": 83309,
    "weight": 20,
    "length": 13,
    "width": 18,
    "height": 13
  },
  {
    "id": 5,
    "name": "Bawang Merah Giling",
    "slug": "bawang-merah-giling",
    "category": {
      "id": 7,
      "name": "BUMBU",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_bumbu1.png"
    },
    "brand": {
      "id": 2,
      "name": "AJINOMOTO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png"
    },
    "short_description": "Et consequatur ut architecto consequatur. Similique commodi quis ad commodi. Dignissimos natus tempo...",
    "description": "Et consequatur ut architecto consequatur. Similique commodi quis ad commodi. Dignissimos natus tempora autem. Repellendus quasi ratione ut sit qui nam.\n\nEnim modi qui ut. Tempora dolores non molestias. Incidunt doloremque debitis accusamus ut rerum eum placeat in. Neque rerum id enim cupiditate ipsum laboriosam.\n\nEt a tenetur exercitationem totam unde quod. Accusantium animi est et. Facilis ratione aut nostrum veniam modi.\n\nCum inventore similique ipsam voluptatem nam dolore. Ipsam commodi est dolorum. Soluta veritatis minus eaque dolores. Voluptatum similique blanditiis voluptatem eius sequi.\n\nEveniet et repellendus asperiores est. Non esse rerum soluta est cum.\n\nVoluptatem error sit quia blanditiis rerum natus. Omnis tempora aut et distinctio sapiente.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/kemiri-compressor.png",
    "price": 58713,
    "unit": "gram",
    "stock": 78829,
    "weight": 15,
    "length": 20,
    "width": 11,
    "height": 9
  },
  {
    "id": 6,
    "name": "Lengkuas",
    "slug": "lengkuas",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Libero voluptates molestiae voluptatem. Quas velit illum voluptates aliquam. Nulla nostrum tempora o...",
    "description": "Libero voluptates molestiae voluptatem. Quas velit illum voluptates aliquam. Nulla nostrum tempora odit veritatis inventore omnis ut. Quidem et neque ea ea asperiores dicta aut. Earum nobis natus excepturi at modi quae enim aperiam.\n\nFugiat qui at quo ipsam. Illo vitae ea id et sunt. Consectetur architecto repellat voluptatem quia.\n\nVoluptas et dolorem ea nihil. Ipsam itaque et nobis quis accusamus error. Ratione non hic et accusantium. Saepe reiciendis velit aut repudiandae est nam nam.\n\nSequi sit dolor voluptates voluptate rerum voluptatum laudantium. Aut aut at facere sed hic pariatur. In ea nobis quae deleniti eum blanditiis distinctio similique.\n\nTempora et quia voluptas recusandae. Quos dolore quaerat nobis. Soluta explicabo omnis ut earum officia tempore consectetur. Accusamus id vel nihil et nostrum repudiandae quia.\n\nEa dolorem impedit perferendis. Tenetur quasi dicta similique non fuga est cupiditate mollitia. Consequatur odio voluptatibus sed quis. Odit sunt tenetur eum provident deleniti molestiae.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/kencur1-compressor.png",
    "price": 79980,
    "unit": "pcs",
    "stock": 95831,
    "weight": 2,
    "length": 3,
    "width": 1,
    "height": 20
  },
  {
  ...........
  }
]
```
#### Menampilkan Product Terlaris
```
METHOD : GET
URL    : /product/best-selling
CONTOH : https://tumbasin-api.herokuapp.com/brand/best-selling
```
Hasil :
```
[
  {
    "id": 1,
    "name": "Pala Bubuk",
    "slug": "pala-bubuk",
    "category": {
      "id": 3,
      "name": "SEMBAKO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
    },
    "brand": {
      "id": 3,
      "name": "SASA",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
    },
    "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
    "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
    "price": 39973,
    "unit": "pcs",
    "stock": 93339,
    "weight": 18,
    "length": 16,
    "width": 4,
    "height": 5
  },
  {
    "id": 2,
    "name": "Jahe Besar",
    "slug": "jahe-besar",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Ut occaecati consequatur dolores. Repellendus assumenda sint rerum enim unde. Quas quas sapiente ius...",
    "description": "Ut occaecati consequatur dolores. Repellendus assumenda sint rerum enim unde. Quas quas sapiente iusto nisi sunt maiores tenetur. Vero qui eos enim velit.\n\nEt animi ipsam omnis ipsum aut commodi. Dolor eaque rem non et. Sit aut enim maiores omnis doloribus. Sit optio temporibus neque ullam.\n\nNobis molestiae possimus qui eos eos. Iusto maiores et consequatur quo ut. Nemo magnam quis quia officia. Eveniet quaerat unde fugiat.\n\nAut ipsam possimus aliquam voluptatem perferendis magnam quo. Fuga est possimus odit voluptas voluptatibus dolorem. Aliquam vitae aliquam maxime velit. Consequuntur doloremque quae quae et consequatur voluptatem fugit. Numquam dicta quia fuga optio molestiae et.\n\nIn aperiam nulla qui. Ea quas cum rerum dignissimos dolorum. Est consequatur error quia et aut consequatur. Fugit repellendus ducimus fuga reiciendis temporibus iusto fuga.\n\nPerferendis inventore dolor sunt eos voluptatem minima est. Consequatur et eum et qui est perspiciatis quo. Aut ea ut id.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-pandan-compressor.png",
    "price": 33746,
    "unit": "pcs",
    "stock": 56276,
    "weight": 13,
    "length": 6,
    "width": 6,
    "height": 3
  },
  {
    "id": 3,
    "name": "Temulawak",
    "slug": "temulawak",
    "category": {
      "id": 5,
      "name": "BUAH",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_buah1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Nobis dolor saepe cupiditate. Eos facilis aut sit occaecati sit voluptatem. Saepe beatae sint rerum...",
    "description": "Nobis dolor saepe cupiditate. Eos facilis aut sit occaecati sit voluptatem. Saepe beatae sint rerum et fugit magnam perspiciatis adipisci. Accusamus eum deleniti consequuntur facilis et aliquid laboriosam.\n\nFacilis tempora velit mollitia earum. Est molestias maiores dolore laboriosam ut cupiditate ratione. Est qui rerum repellendus omnis rerum. Velit et non quis tempora. Ratione omnis autem recusandae amet ea praesentium.\n\nEt ipsam eaque sed dolorem. Aut ratione quo ut. Id dolores quam repellat dolor. Non beatae velit et non.\n\nAnimi quae ea blanditiis ea odio. Est quae sit minima quis eveniet. Placeat neque neque mollitia eos. Et impedit officiis temporibus ipsa velit ut aut.\n\nBlanditiis quis neque asperiores occaecati ducimus suscipit aut. Voluptas eligendi molestiae neque consequuntur qui. Saepe aut harum et aut minus laborum.\n\nEt error dolores necessitatibus omnis amet. Odit placeat sunt incidunt et sed. Itaque asperiores odio hic dolores. Voluptas error perspiciatis modi tenetur ut.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-putih-compressor.jpg",
    "price": 96026,
    "unit": "gram",
    "stock": 72549,
    "weight": 6,
    "length": 10,
    "width": 2,
    "height": 3
  },
  {
    "id": 4,
    "name": "Bumbu Bali",
    "slug": "bumbu-bali",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 2,
      "name": "AJINOMOTO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png"
    },
    "short_description": "Perspiciatis vitae dicta sunt ut. Laboriosam repellat dicta ea autem vitae cupiditate totam. Volupta...",
    "description": "Perspiciatis vitae dicta sunt ut. Laboriosam repellat dicta ea autem vitae cupiditate totam. Voluptates hic velit et ut qui vero dolor. Quos quia in assumenda asperiores.\n\nFacilis eius ut aut nisi. Commodi provident quo velit alias. Et nemo blanditiis praesentium perspiciatis est incidunt.\n\nFugit eos minus asperiores vel. Cumque ipsam rerum nam similique.\n\nDolores ex molestiae assumenda repellendus aut. Non minus et omnis laboriosam soluta sunt iure. Qui quisquam facilis dolor rem vel sint. Consequatur mollitia et consequuntur autem voluptas sapiente.\n\nRem eligendi facere dolor possimus. Assumenda eveniet ipsa qui et officia aspernatur reiciendis corporis. Placeat autem mollitia officiis facere laboriosam mollitia. Quo sit quod maxime dolore vel in.\n\nMagni molestias facere ab et voluptatum. Ea assumenda et delectus sit. Dolor quos debitis blanditiis tempore neque incidunt odio.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/merica-bubuk-compressor.png",
    "price": 19645,
    "unit": "pcs",
    "stock": 83309,
    "weight": 20,
    "length": 13,
    "width": 18,
    "height": 13
  },
  {
    "id": 5,
    "name": "Bawang Merah Giling",
    "slug": "bawang-merah-giling",
    "category": {
      "id": 7,
      "name": "BUMBU",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_bumbu1.png"
    },
    "brand": {
      "id": 2,
      "name": "AJINOMOTO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png"
    },
    "short_description": "Et consequatur ut architecto consequatur. Similique commodi quis ad commodi. Dignissimos natus tempo...",
    "description": "Et consequatur ut architecto consequatur. Similique commodi quis ad commodi. Dignissimos natus tempora autem. Repellendus quasi ratione ut sit qui nam.\n\nEnim modi qui ut. Tempora dolores non molestias. Incidunt doloremque debitis accusamus ut rerum eum placeat in. Neque rerum id enim cupiditate ipsum laboriosam.\n\nEt a tenetur exercitationem totam unde quod. Accusantium animi est et. Facilis ratione aut nostrum veniam modi.\n\nCum inventore similique ipsam voluptatem nam dolore. Ipsam commodi est dolorum. Soluta veritatis minus eaque dolores. Voluptatum similique blanditiis voluptatem eius sequi.\n\nEveniet et repellendus asperiores est. Non esse rerum soluta est cum.\n\nVoluptatem error sit quia blanditiis rerum natus. Omnis tempora aut et distinctio sapiente.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/kemiri-compressor.png",
    "price": 58713,
    "unit": "gram",
    "stock": 78829,
    "weight": 15,
    "length": 20,
    "width": 11,
    "height": 9
  },
  {
    "id": 6,
    "name": "Lengkuas",
    "slug": "lengkuas",
    "category": {
      "id": 1,
      "name": "SAYURAN",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
    },
    "brand": {
      "id": 1,
      "name": "NESTLE",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
    },
    "short_description": "Libero voluptates molestiae voluptatem. Quas velit illum voluptates aliquam. Nulla nostrum tempora o...",
    "description": "Libero voluptates molestiae voluptatem. Quas velit illum voluptates aliquam. Nulla nostrum tempora odit veritatis inventore omnis ut. Quidem et neque ea ea asperiores dicta aut. Earum nobis natus excepturi at modi quae enim aperiam.\n\nFugiat qui at quo ipsam. Illo vitae ea id et sunt. Consectetur architecto repellat voluptatem quia.\n\nVoluptas et dolorem ea nihil. Ipsam itaque et nobis quis accusamus error. Ratione non hic et accusantium. Saepe reiciendis velit aut repudiandae est nam nam.\n\nSequi sit dolor voluptates voluptate rerum voluptatum laudantium. Aut aut at facere sed hic pariatur. In ea nobis quae deleniti eum blanditiis distinctio similique.\n\nTempora et quia voluptas recusandae. Quos dolore quaerat nobis. Soluta explicabo omnis ut earum officia tempore consectetur. Accusamus id vel nihil et nostrum repudiandae quia.\n\nEa dolorem impedit perferendis. Tenetur quasi dicta similique non fuga est cupiditate mollitia. Consequatur odio voluptatibus sed quis. Odit sunt tenetur eum provident deleniti molestiae.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/kencur1-compressor.png",
    "price": 79980,
    "unit": "pcs",
    "stock": 95831,
    "weight": 2,
    "length": 3,
    "width": 1,
    "height": 20
  },
  {
  ...........
  }
]
```
#### Menambahkan data product
```
METHOD : POST
URL    : /product
PARAMS : 
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
CONTOH : https://tumbasin-api.herokuapp.com/product
```
Hasil :
```
[
  {
    "id": 100,
    "name": "Pala Bubuk",
    "slug": "pala-bubuk",
    "category": {
      "id": 3,
      "name": "SEMBAKO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
    },
    "brand": {
      "id": 3,
      "name": "SASA",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
    },
    "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
    "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
    "price": 39973,
    "unit": "pcs",
    "stock": 93339,
    "weight": 18,
    "length": 16,
    "width": 4,
    "height": 5
  }
]
```
#### Mengubah data product
```
METHOD : PUT atau PATCH
URL    : /product/{product_id}
PARAMS : 
'id'          => ['required', 'numeric']
'name'        => ['required', 'string', 'max:255']
'description' => ['required', 'string']
'image'       => ['optional', 'string']
'price'       => ['required', 'numeric']
'unit'        => ['required', 'string']
'stock'       => ['required', 'numeric']
'weight'      => ['required', 'string']
'length'      => ['required', 'string']
'width'       => ['required', 'string']
'height'      => ['required', 'string']
CONTOH : https://tumbasin-api.herokuapp.com/product/1
```
Hasil :
```
[
  {
    "id": 100,
    "name": "Pala Bubuk",
    "slug": "pala-bubuk",
    "category": {
      "id": 3,
      "name": "SEMBAKO",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
    },
    "brand": {
      "id": 3,
      "name": "SASA",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
    },
    "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
    "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
    "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
    "price": 39973,
    "unit": "pcs",
    "stock": 93339,
    "weight": 18,
    "length": 16,
    "width": 4,
    "height": 5
  }
]
```
#### Menghapus data product
```
METHOD : DELETE
URL    : /product/{product_id}
PARAMS : 
'id' => ['required', 'numeric']
CONTOH : https://tumbasin-api.herokuapp.com/product/1
```
Hasil :
```
[
  {
    "message": "deleted"
  }
]
```

## Akses Order
#### Menampilkan Seluruh Order
```
METHOD : GET
URL    : /order
CONTOH : https://tumbasin-api.herokuapp.com/order
```
Hasil :
```
[
  {
    "id": 1,
    "order_number": 124523,
    "user": {
      "id": 4,
      "name": "Alessandro Von",
      "email": "gerlach.mafalda@example.com"
    },
    "product": {
      "id": 10,
      "name": "Saus ABC",
      "slug": "saus-abc",
      "category": {
        "id": 3,
        "name": "SEMBAKO",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
      },
      "brand": {
        "id": 4,
        "name": "INDOFOOD",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_indofood.png"
      },
      "short_description": "Corporis et maxime molestias consectetur. Aspernatur maxime impedit nulla qui exercitationem. Hic pr...",
      "description": "Corporis et maxime molestias consectetur. Aspernatur maxime impedit nulla qui exercitationem. Hic praesentium qui aliquam eligendi.\n\nQuasi non nam vitae. Sunt id facilis facilis aspernatur quidem molestiae tempore. Rem quis quibusdam expedita aut eum quo praesentium. Corporis et veritatis harum molestias.\n\nEt deleniti aspernatur quia occaecati pariatur doloribus. Est optio provident facere et. Exercitationem odio enim natus explicabo qui eum possimus rerum. Sit vero necessitatibus reprehenderit cum rem aperiam voluptas hic.\n\nVoluptatem alias consequatur quas deserunt in et. Et aspernatur eum cumque nesciunt. Sed aliquid officiis voluptatibus magni iure consequuntur. Mollitia veniam facilis dolorem vero blanditiis.\n\nEnim debitis recusandae minima aut est minus facere. Itaque cumque corporis quod culpa. Consequatur quidem sapiente iure maiores eum quaerat distinctio.\n\nUt eius dolore sed quis nihil voluptates dolorem beatae. Non vel numquam ea voluptatum voluptatem. Eos qui ducimus laboriosam in voluptas. Quas illum perspiciatis magni natus rerum optio.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/masako-sapi.png",
      "price": 49998,
      "unit": "gram",
      "stock": 27229,
      "weight": 16,
      "length": 15,
      "width": 13,
      "height": 10
    },
    "quantity": 4,
    "status": "PROSES"
  },
  {
    "id": 2,
    "order_number": 124524,
    "user": {
      "id": 18,
      "name": "Mrs. Eulalia Cole",
      "email": "kirstin.conroy@example.org"
    },
    "product": {
      "id": 18,
      "name": "Pekak",
      "slug": "pekak",
      "category": {
        "id": 4,
        "name": "LAUK PAUK",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_daging1.png"
      },
      "brand": {
        "id": 3,
        "name": "SASA",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
      },
      "short_description": "Ab illo id possimus sint. Ad blanditiis magnam architecto deleniti recusandae vel quibusdam. Sed vol...",
      "description": "Ab illo id possimus sint. Ad blanditiis magnam architecto deleniti recusandae vel quibusdam. Sed voluptatum esse fugiat laborum dolores architecto corporis molestias.\n\nNesciunt omnis tempore ipsa. Rerum autem dolor eligendi itaque asperiores itaque dolor.\n\nVoluptas et nulla fugit ab. Aut temporibus qui distinctio et. Quasi reiciendis doloribus facere ex dolores unde.\n\nEligendi ullam perferendis maxime est at sed sunt. Quisquam distinctio fugiat et quisquam deleniti suscipit vitae numquam. Suscipit quia exercitationem ut sed repellendus. Voluptatem facilis consectetur iusto voluptas.\n\nDistinctio hic nemo est voluptates et aliquid non. Repellat distinctio nostrum qui optio ut nam eligendi. Inventore omnis in id.\n\nPerferendis exercitationem ut inventore quasi ducimus expedita. Quasi soluta assumenda rerum doloremque. Blanditiis et optio fugit at facilis minus. Rem repudiandae optio dolor quod quis animi.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-sirih-bumbu.jpg",
      "price": 49553,
      "unit": "pcs",
      "stock": 99337,
      "weight": 15,
      "length": 11,
      "width": 13,
      "height": 14
    },
    "quantity": 3,
    "status": "PROSES"
  },
  {
    "id": 3,
    "order_number": 124525,
    "user": {
      "id": 8,
      "name": "Robbie Dickens",
      "email": "jamaal.walker@example.com"
    },
    "product": {
      "id": 43,
      "name": "Bumbu Rica-rica",
      "slug": "bumbu-rica-rica",
      "category": {
        "id": 1,
        "name": "SAYURAN",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png"
      },
      "brand": {
        "id": 1,
        "name": "NESTLE",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png"
      },
      "short_description": "Omnis fugit beatae omnis optio. Dolores voluptas et quae sit doloremque. Sit corporis sapiente quas...",
      "description": "Omnis fugit beatae omnis optio. Dolores voluptas et quae sit doloremque. Sit corporis sapiente quas unde id et praesentium. Est atque enim cumque officia blanditiis.\n\nDolores quibusdam fuga quidem cumque aut voluptatem vel ea. Est consectetur qui consequuntur provident rerum odio at. Minima aspernatur iusto enim. Qui enim tempore est voluptatum distinctio.\n\nAsperiores magnam dolor molestias doloremque dolores nostrum consequatur. Sit necessitatibus itaque dolore autem id.\n\nSaepe ea totam eos. Quis necessitatibus commodi velit et illum. Nulla expedita cumque ducimus sed tempora repellendus.\n\nAut beatae maxime sapiente quia nihil consectetur. Recusandae blanditiis dicta facere est sit dolorem sint. Atque vitae et quae velit ratione odit fugit. Harum eveniet et enim.\n\nQui quasi expedita molestias rerum laudantium voluptates recusandae. Animi at impedit praesentium et laboriosam quod expedita. Maxime cum et et debitis. Minus omnis et quasi eos ut. Voluptas delectus maxime placeat voluptatibus adipisci nulla.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/ketumbar-compressor.png",
      "price": 11249,
      "unit": "gram",
      "stock": 20157,
      "weight": 11,
      "length": 5,
      "width": 20,
      "height": 20
    },
    "quantity": 3,
    "status": "DELIVERY"
    },
  {
  ...........
  }
]
```
#### Menampilkan Order Berdasarkan Product
```
METHOD : GET
URL    : /order/product/{product_id}
PARAMS : 
'id' => ['required', 'numeric']
CONTOH : https://tumbasin-api.herokuapp.com/order/product/1
```
Hasil :
```
[
  {
    "id": 13,
    "order_number": 124535,
    "user": {
      "id": 17,
      "name": "Mrs. Sophie Hill DDS",
      "email": "antonio56@example.org"
    },
    "product": {
      "id": 1,
      "name": "Pala Bubuk",
      "slug": "pala-bubuk",
      "category": {
        "id": 3,
        "name": "SEMBAKO",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
      },
      "brand": {
        "id": 3,
        "name": "SASA",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
      },
      "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
      "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
      "price": 39973,
      "unit": "pcs",
      "stock": 93339,
      "weight": 18,
      "length": 16,
      "width": 4,
      "height": 5
    },
    "quantity": 5,
    "status": "ONGOING"
  },
  {
    "id": 41,
    "order_number": 124563,
    "user": {
      "id": 18,
      "name": "Mrs. Eulalia Cole",
      "email": "kirstin.conroy@example.org"
    },
    "product": {
      "id": 1,
      "name": "Pala Bubuk",
      "slug": "pala-bubuk",
      "category": {
        "id": 3,
        "name": "SEMBAKO",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
      },
      "brand": {
        "id": 3,
        "name": "SASA",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
      },
      "short_description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia...",
      "description": "Et dolorem inventore a illo quam et facere. Ea recusandae ducimus cum aspernatur velit. Non qui quia qui quo.\n\nError facere molestias eos nihil ea est. Magnam sapiente dicta harum eligendi quia. Exercitationem doloremque alias excepturi ut reiciendis omnis nisi. Laborum sunt recusandae nobis.\n\nQui est omnis aliquam et asperiores qui deserunt. Vel aut blanditiis non doloribus vitae dicta debitis pariatur. Fuga inventore deleniti beatae quae a ut in vero.\n\nEst officia qui deleniti dolorum sapiente dolore impedit. Esse ea rerum eos molestias ducimus. Ad sapiente reiciendis non aut.\n\nVeniam voluptatem aut ducimus est sed veritatis earum. Expedita sit ut qui beatae. Voluptates rerum dolores numquam unde impedit nihil.\n\nAut consequuntur possimus voluptatem dolores. Ullam ut ducimus omnis minima delectus et facilis nesciunt.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png",
      "price": 39973,
      "unit": "pcs",
      "stock": 93339,
      "weight": 18,
      "length": 16,
      "width": 4,
      "height": 5
    },
    "quantity": 1,
    "status": "COMPLETE"
    }
]
```
#### Menampilkan Order Berdasarkan Status Barang
```
METHOD : GET
URL    : /order/status/{status_id}
PARAMS : 
'id' => ['required', 'numeric']
CONTOH : https://tumbasin-api.herokuapp.com/order/status/1
STATUS_ID :
0 => 'CANCEL'
1 => 'PROSES' - default
2 => 'ONGOING'
3 => 'DELIVERY'
4 => 'COMPLETE'
```
Hasil :
```
[
  {
    "id": 1,
    "order_number": 124523,
    "user": {
      "id": 4,
      "name": "Alessandro Von",
      "email": "gerlach.mafalda@example.com"
    },
    "product": {
      "id": 10,
      "name": "Saus ABC",
      "slug": "saus-abc",
      "category": {
        "id": 3,
        "name": "SEMBAKO",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png"
      },
      "brand": {
        "id": 4,
        "name": "INDOFOOD",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_indofood.png"
      },
      "short_description": "Corporis et maxime molestias consectetur. Aspernatur maxime impedit nulla qui exercitationem. Hic pr...",
      "description": "Corporis et maxime molestias consectetur. Aspernatur maxime impedit nulla qui exercitationem. Hic praesentium qui aliquam eligendi.\n\nQuasi non nam vitae. Sunt id facilis facilis aspernatur quidem molestiae tempore. Rem quis quibusdam expedita aut eum quo praesentium. Corporis et veritatis harum molestias.\n\nEt deleniti aspernatur quia occaecati pariatur doloribus. Est optio provident facere et. Exercitationem odio enim natus explicabo qui eum possimus rerum. Sit vero necessitatibus reprehenderit cum rem aperiam voluptas hic.\n\nVoluptatem alias consequatur quas deserunt in et. Et aspernatur eum cumque nesciunt. Sed aliquid officiis voluptatibus magni iure consequuntur. Mollitia veniam facilis dolorem vero blanditiis.\n\nEnim debitis recusandae minima aut est minus facere. Itaque cumque corporis quod culpa. Consequatur quidem sapiente iure maiores eum quaerat distinctio.\n\nUt eius dolore sed quis nihil voluptates dolorem beatae. Non vel numquam ea voluptatum voluptatem. Eos qui ducimus laboriosam in voluptas. Quas illum perspiciatis magni natus rerum optio.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/masako-sapi.png",
      "price": 49998,
      "unit": "gram",
      "stock": 27229,
      "weight": 16,
      "length": 15,
      "width": 13,
      "height": 10
    },
    "quantity": 4,
    "status": "PROSES"
  },
  {
    "id": 2,
    "order_number": 124524,
    "user": {
      "id": 18,
      "name": "Mrs. Eulalia Cole",
      "email": "kirstin.conroy@example.org"
    },
    "product": {
      "id": 18,
      "name": "Pekak",
      "slug": "pekak",
      "category": {
        "id": 4,
        "name": "LAUK PAUK",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/img_daging1.png"
      },
      "brand": {
        "id": 3,
        "name": "SASA",
        "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png"
      },
      "short_description": "Ab illo id possimus sint. Ad blanditiis magnam architecto deleniti recusandae vel quibusdam. Sed vol...",
      "description": "Ab illo id possimus sint. Ad blanditiis magnam architecto deleniti recusandae vel quibusdam. Sed voluptatum esse fugiat laborum dolores architecto corporis molestias.\n\nNesciunt omnis tempore ipsa. Rerum autem dolor eligendi itaque asperiores itaque dolor.\n\nVoluptas et nulla fugit ab. Aut temporibus qui distinctio et. Quasi reiciendis doloribus facere ex dolores unde.\n\nEligendi ullam perferendis maxime est at sed sunt. Quisquam distinctio fugiat et quisquam deleniti suscipit vitae numquam. Suscipit quia exercitationem ut sed repellendus. Voluptatem facilis consectetur iusto voluptas.\n\nDistinctio hic nemo est voluptates et aliquid non. Repellat distinctio nostrum qui optio ut nam eligendi. Inventore omnis in id.\n\nPerferendis exercitationem ut inventore quasi ducimus expedita. Quasi soluta assumenda rerum doloremque. Blanditiis et optio fugit at facilis minus. Rem repudiandae optio dolor quod quis animi.",
      "image": "https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-sirih-bumbu.jpg",
      "price": 49553,
      "unit": "pcs",
      "stock": 99337,
      "weight": 15,
      "length": 11,
      "width": 13,
      "height": 14
    },
    "quantity": 3,
    "status": "PROSES"
  },
  {
    .............................
  }
]
```
