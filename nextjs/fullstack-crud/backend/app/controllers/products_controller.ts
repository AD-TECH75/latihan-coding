import Product from '#models/product'
import type { HttpContext } from '@adonisjs/core/http'

export default class ProductsController {
  async index() {
    return await Product.all()
  }

  async store({ request }: HttpContext) {
    const data = request.only(['name', 'price', 'stock'])

    const product = await Product.create(data)

    return product
  }

  async show({ params }: HttpContext) {
    return await Product.findOrFail(params.id)
  }

  async update({ params, request }: HttpContext) {
    const product = await Product.findOrFail(params.id)

    const data = request.only(['name', 'price', 'stock'])

    product.merge(data)

    await product.save()

    return product
  }

  async destroy({ params }: HttpContext) {
    const product = await Product.findOrFail(params.id)

    await product.delete()

    return {
      message: 'Product deleted',
    }
  }
}
