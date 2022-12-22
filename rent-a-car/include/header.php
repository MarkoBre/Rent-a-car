<header>

    <ul>

        <li>

            <a href="../index.php" <?php if ('PAGE'=='home')
                print ' class="kingMenuLinkOn"'; ?>>Home</a>

        </li><li>

            <a href="../vehicle/vehicles.php" <?php if ('PAGE'=='vehicles')
                print ' class="kingMenuLinkOn"'; ?>>Vehicles</a>

        </li><li>

            <a href="../vehicle/createVehicle.php" <?php if ('PAGE'=='createVehicle')
                print ' class=kingMenuLinkOn"'; ?>>Add a vehicle</a>

        </li><li>

            <a href="../person/persons.php" <?php if ('PAGE'=='persons')
                print ' class="kingMenuLinkOn"'; ?>>Persons</a>

        </li><li>

            <a href="../person/createPerson.php" <?php if ('PAGE'=='createPerson')
                print ' class="kingMenuLinkOn"'; ?>>Add a person</a>

        </li><li>

            <a href="../info/aboutUs.php" <?php if ('PAGE'=='aboutUs')
                print ' class="kingMenuLinkOn"'; ?>>About us</a>

        </li><li>

            <a href="../info/contact.php" <?php if ('PAGE'=='contact')
                print ' class="kingMenuLinkOn"'; ?>>Contact</a>

        </li><li>

            <a href="../rented/rented.php" <?php if ('PAGE'=='rents')
                print ' class="kingMenuLinkOn"'; ?>>Rents</a>

        </li><li>

            <a href="../rented/createRent.php" <?php if ('PAGE'=='createRent')
                print ' class="kingMenuLinkOn"'; ?>>Add a rent</a>

    </ul>

</header>