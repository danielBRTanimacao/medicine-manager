// Função para abrir o modal de edição
function openModal() {
    document.getElementById("editModal").style.display = "block";
}

function closeModal() {
    document.getElementById("editModal").style.display = "none";
}

function confirmDelete(id) {
    if (confirm("Tem certeza que deseja excluir este medicamento?")) {
        fetch("medicine_delete.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${id}`
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = "index.php";
                } else {
                    alert("Erro ao excluir medicamento.");
                }
            })
            .catch((error) => console.error("Erro:", error));
    }
}
