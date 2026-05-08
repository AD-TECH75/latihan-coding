import router from '@adonisjs/core/services/router'

const ProductsController = () => import('#controllers/products_controller')

router.get('/products', [ProductsController, 'index'])
router.post('/products', [ProductsController, 'store'])
router.get('/products/:id', [ProductsController, 'show'])
router.put('/products/:id', [ProductsController, 'update'])
router.delete('/products/:id', [ProductsController, 'destroy'])
