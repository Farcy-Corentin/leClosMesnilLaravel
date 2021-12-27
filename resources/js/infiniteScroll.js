const dataWrapperEl = document.querySelector('#data-wrapper')
const buttonLoad = document.getElementById('buttonLoad')
const template = {
    el: document.getElementById('templatePost'),
    content: '',
    categoryId: '',
}
template.content = template.el.innerHTML
template.categoryId = template.el.dataset.category

let currentPage = 2
let nextPageAvailable = true
let postLoading = false

const disableNextPage = () => {
    nextPageAvailable = false
    buttonLoad.style.display = 'none'
}

if(template.el.dataset.nextAvailable !== '1') {
    disableNextPage()
}

/**
 * @typedef {Object} Post
 * @property {number} id
 * @property {string} user_id
 */

/**
 * @typedef {Object} PaginatePost
 * @property {number} current_page
 * @property {Array<Post>} data
 */

/**
 *
 * @param page
 * @param categoryId
 * @returns {Promise<null|PaginatePost>}
 */
const getPaginatePosts = async (page, categoryId) => {
    const headers = {
        'Content-type': 'application/json'
    }
    const url = categoryId === ''
        ? `/posts?page=${page}`
        : `/posts?cat=${categoryId}&page=${page}`

    const response = await fetch(url, {headers})
    if (response.status !== 200) {
        return null
    }

    return await response.json()
}

/**
 * @param {Post} post
 */
const addPost = (post) => {
    const postEl = document.createElement('article')
    postEl.classList.add(...('mb-4 pr-5 col-12 col-md-6 col-xl-4'.split(' ')))

    postEl.innerHTML = template.content
        .replace('[IMAGE]', post.image_path)
        .replace('[CATEGORY]', post.category.name)
        .replace('[CREATED_AT]', post.created_at)
        .replace('[TITLE]', post.title)
        .replace('[CONTENT]', post.content)
        .replace('[SLUG]', post.slug)
    dataWrapperEl.appendChild(postEl)
}

const getNextPost = async () => {
    if (!nextPageAvailable || postLoading) {
        return undefined
    }
    postLoading = true

    const posts = await getPaginatePosts(currentPage, template.categoryId)
    posts.data.forEach(addPost)

    postLoading = false
    if (posts.meta.links.next === null) {
        disableNextPage()
        return undefined
    }
    currentPage+=1
}
buttonLoad.addEventListener('click', getNextPost)

template.el.remove()
