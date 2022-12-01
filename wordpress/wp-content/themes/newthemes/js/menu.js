
document.getElementById('').addEventListener('click',
  (theFunction = () => {
    let x = document.getElementById('theTarget')
    if (x.className === 'styleOne') {
      x.className = 'styleTwo'
		} else {
			  x.className = 'styleOne'
			}
	}))


