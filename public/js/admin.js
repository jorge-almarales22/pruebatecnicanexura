// const formulario = document.getElementById('formulario');

// formulario.addEventListener('submit', (e) =>{
//     e.preventDefault()
//     const name = document.getElementById('name').value;
//     const content = document.getElementById('content').value;
//     axios({
//         method: 'POST',
//         url: '/home',
//         data:{
//             name,
//             content
//         }
//     }).then((res)=> {
//         const list = document.getElementById('list');
//         const fragment = document.createDocumentFragment();
//         for(const post of res.data.posts)
//         {
//             const listItem = document.createElement('li');
//             listItem.textContent = `nombre del post: ${post.name} & contenido del post es: ${post.content}`;
//             fragment.appendChild(listItem)
//         }
//         list.appendChild(fragment);
//         formulario.reset()
//         $('#exampleModal').modal('hide');
//         document.getElementById('mensaje-exito').style.display = 'block';
//         setTimeout(()=>{
//             document.getElementById('mensaje-exito').style.display = 'none';
//         },3000)
//     })
// })