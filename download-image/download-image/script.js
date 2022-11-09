let input = document.querySelector('#field')
let previewBox = document.querySelector('.preview-box')
let imgPreview = document.querySelector('.img-preview')
let button = document.querySelector('#button')
let closeImg = document.querySelector('.cancle-img')
input.addEventListener('focusout', () => {
  let imgValue = input.value
  if (imgValue !== '') {
    let photoReg = /\.(jpe?g|png|gif|bmp)$/i
    if (photoReg.test(imgValue)) {
      let imgTag = document.createElement('img')
      imgTag.src = imgValue
      imgPreview.appendChild(imgTag)
      input.classList.add('disabled')
      button.classList.add('active')
      closeImg.classList.add('active')
      previewBox.classList.add('active')

      closeImg.addEventListener('click', () => {
        input.classList.remove('disabled')
        button.classList.remove('active')
        let imgView = document.querySelector('.img-preview img')
        imgView.remove()
        closeImg.classList.remove('active')
        previewBox.classList.remove('active')
      })
    } else {
      alert('Invalid img URL - ' + imgValue)
      input.value = ''
    }
  }
})
