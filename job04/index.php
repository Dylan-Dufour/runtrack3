<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        button {
            padding: 10px 20px;
            margin: 20px 0;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <button id="update">Update</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="usersList">
            <!-- Les données seront insérées ici par JavaScript -->
        </tbody>
    </table>

    <script>
        function updateUsersList() {
            const tbody = document.getElementById('usersList');
            
            fetch('users.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau: ' + response.status);
                    }
                    return response.json();
                })
                .then(users => {
                    // Vider le tableau actuel
                    tbody.innerHTML = '';
                    
                    // Ajouter chaque utilisateur au tableau
                    users.forEach(user => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${user.id}</td>
                            <td>${user.nom}</td>
                            <td>${user.prenom}</td>
                            <td>${user.email}</td>
                        `;
                        tbody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="4" class="error">
                                Erreur lors du chargement des utilisateurs: ${error.message}
                            </td>
                        </tr>
                    `;
                });
        }

        // Écouteur d'événement sur le bouton update
        document.getElementById('update').addEventListener('click', updateUsersList);

        // Charger les utilisateurs au chargement initial de la page
        updateUsersList();
    </script>
</body>
</html>