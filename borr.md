SELECT 
    d.Nombre,
    d.Apellido,
    c.Nombre AS Carrera,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Lunes' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Lunes' THEN h.HoraFin END)), ''
    ) AS Lunes,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Martes' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Martes' THEN h.HoraFin END)), ''
    ) AS Martes,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Miércoles' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Miércoles' THEN h.HoraFin END)), ''
    ) AS Miércoles,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Jueves' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Jueves' THEN h.HoraFin END)), ''
    ) AS Jueves,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Viernes' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Viernes' THEN h.HoraFin END)), ''
    ) AS Viernes,
    COALESCE(
        CONCAT(MIN(CASE WHEN h.Dia = 'Sábado' THEN h.HoraInicio END), ' A ', MAX(CASE WHEN h.Dia = 'Sábado' THEN h.HoraFin END)), ''
    ) AS Sábado
FROM 
    Docentes d
JOIN 
    DocenteMateria dm ON d.DocenteID = dm.DocenteID
JOIN 
    Materias m ON dm.MateriaID = m.MateriaID
JOIN 
    Carreras c ON m.CarreraID = c.CarreraID
JOIN 
    Horarios h ON dm.HorarioID = h.HorarioID
GROUP BY 
    d.DocenteID, c.CarreraID
ORDER BY 
    d.Apellido, d.Nombre;
