/* eslint-disable prettier/prettier */
import type { routes } from './index.ts'

export interface ApiDefinition {
  products: {
    index: typeof routes['products.index']
    store: typeof routes['products.store']
    show: typeof routes['products.show']
    update: typeof routes['products.update']
    destroy: typeof routes['products.destroy']
  }
}
