    <div class="footer" id="footer" style="display: none;">
            <h5>Special title treatment</h5>
            <p>With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn-footer">Go somewhere</a>
            <div>2 days ago</div>
    </div>

    <script>
          // JavaScript para mostrar el footer al llegar al final de la página
          document.addEventListener("scroll", function() {
            var footer = document.getElementById("footer");
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              // Muestra el footer cuando se llega al final de la página
              footer.style.display = "block";
            } else {
              // Oculta el footer si no se está al final de la página
              footer.style.display = "none";
            }
          });
    </script>
    
</div> 

</body>
</html>