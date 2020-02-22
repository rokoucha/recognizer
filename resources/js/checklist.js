export default class Checklist {
  /**
   * Constructor
   *
   * @param {string} data
   */
  constructor(data) {
    this.checks = this.validate(JSON.parse(data))
  }

  /**
   * Validate value type
   *
   * @param {any} value
   * @param {string} type
   *
   * @returns {void}
   */
  validateType(value, type) {
    switch (type) {
      case 'boolean':
        if (typeof value !== 'boolean') {
          throw new Error(`"${typeof value}" is not boolean`)
        }
        break

      case 'string':
        if (typeof value !== 'string') {
          throw new Error(`"${typeof value}" is not string`)
        }
        break

      case 'array':
        if (!Array.isArray(value)) {
          throw new Error(`"${typeof value}" is not array`)
        }
        break

      default:
        throw new Error(`"${type}" is not defined type`)
    }
  }

  /**
   * Validate checks object
   *
   * @param {Object} checksObject
   *
   * @returns {Object} checks object
   */
  validate(checksObject) {
    // Root validate
    ;[
      {
        key: 'ordered',
        type: 'boolean',
      },
      {
        key: 'children',
        type: 'array',
      },
    ].forEach(value => {
      if (!Object.keys(checksObject).includes(value.key)) {
        throw new Error(`Key "${value.key}" is not exist`)
      }
      this.validateType(checksObject[value.key], value.type)
    })

    // Child validate
    const validateChild = child => {
      ;[
        {
          key: 'title',
          type: 'string',
        },
        {
          key: 'checked',
          type: 'boolean',
        },
        {
          key: 'ordered',
          type: 'boolean',
        },
        {
          key: 'children',
          type: 'array',
        },
      ].forEach(value => {
        if (!Object.keys(child).includes(value.key)) {
          throw new Error(`Key "${value.key}" is not exist`)
        }
        this.validateType(child[value.key], value.type)
      })
      if (0 < child.children.length) {
        child.children.forEach(grandChild => {
          validateChild(grandChild)
        })
      }
    }

    checksObject.children.forEach(child => {
      validateChild(child)
    })

    return checksObject
  }
}
