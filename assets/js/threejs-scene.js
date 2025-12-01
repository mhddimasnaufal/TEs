// Three.js 3D Scene
function initThreeJSScene() {
    // Check if Three.js is available
    if (typeof THREE === 'undefined') {
        console.warn('Three.js not loaded');
        return;
    }
    
    const container = document.getElementById('threejs-container');
    if (!container) return;
    
    // Scene setup
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ 
        alpha: true, 
        antialias: true 
    });
    
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);
    
    // Lighting
    const ambientLight = new THREE.AmbientLight(0xffacc7, 0.5);
    scene.add(ambientLight);
    
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(5, 5, 5);
    scene.add(directionalLight);
    
    // Create floating hearts
    const heartGeometry = createHeartGeometry();
    const heartMaterial = new THREE.MeshPhongMaterial({ 
        color: 0xff6b8b,
        shininess: 100,
        transparent: true,
        opacity: 0.7
    });
    
    const hearts = [];
    const heartCount = 15;
    
    for (let i = 0; i < heartCount; i++) {
        const heart = new THREE.Mesh(heartGeometry, heartMaterial);
        
        // Random position
        heart.position.x = (Math.random() - 0.5) * 20;
        heart.position.y = (Math.random() - 0.5) * 20;
        heart.position.z = (Math.random() - 0.5) * 20;
        
        // Random size
        const scale = Math.random() * 0.5 + 0.3;
        heart.scale.set(scale, scale, scale);
        
        // Store rotation speed
        heart.userData = {
            rotationSpeed: {
                x: Math.random() * 0.02 - 0.01,
                y: Math.random() * 0.02 - 0.01,
                z: Math.random() * 0.02 - 0.01
            },
            floatSpeed: Math.random() * 0.02 + 0.01,
            floatDirection: Math.random() * Math.PI * 2
        };
        
        scene.add(heart);
        hearts.push(heart);
    }
    
    // Create floating text "NAILA"
    const textLoader = new THREE.FontLoader();
    textLoader.load('https://threejs.org/examples/fonts/helvetiker_regular.typeface.json', function(font) {
        const textGeometry = new THREE.TextGeometry('NAILA', {
            font: font,
            size: 2,
            height: 0.5,
            curveSegments: 12,
            bevelEnabled: true,
            bevelThickness: 0.1,
            bevelSize: 0.1,
            bevelSegments: 5
        });
        
        const textMaterial = new THREE.MeshPhongMaterial({ 
            color: 0xa855f7,
            shininess: 100
        });
        
        const textMesh = new THREE.Mesh(textGeometry, textMaterial);
        textMesh.position.y = 5;
        scene.add(textMesh);
    });
    
    // Camera position
    camera.position.z = 15;
    
    // Animation
    function animate() {
        requestAnimationFrame(animate);
        
        // Animate hearts
        hearts.forEach(heart => {
            heart.rotation.x += heart.userData.rotationSpeed.x;
            heart.rotation.y += heart.userData.rotationSpeed.y;
            heart.rotation.z += heart.userData.rotationSpeed.z;
            
            // Floating motion
            heart.position.y += Math.sin(Date.now() * 0.001 * heart.userData.floatSpeed) * 0.01;
            heart.position.x += Math.cos(Date.now() * 0.001 * heart.userData.floatDirection) * 0.01;
        });
        
        // Slow camera rotation
        camera.position.x = Math.sin(Date.now() * 0.0005) * 10;
        camera.position.z = 15 + Math.cos(Date.now() * 0.0005) * 5;
        camera.lookAt(scene.position);
        
        renderer.render(scene, camera);
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
    
    // Start animation
    animate();
    
    // Helper function to create heart geometry
    function createHeartGeometry() {
        const shape = new THREE.Shape();
        
        const x = 0, y = 0;
        shape.moveTo(x + 2.5, y + 2.5);
        shape.bezierCurveTo(x + 2.5, y + 2.5, x + 2, y, x, y);
        shape.bezierCurveTo(x - 3, y, x - 3, y + 4.5, x - 3, y + 4.5);
        shape.bezierCurveTo(x - 3, y + 7.5, x - 1.5, y + 9.5, x + 2.5, y + 11.5);
        shape.bezierCurveTo(x + 6.5, y + 9.5, x + 8, y + 7.5, x + 8, y + 4.5);
        shape.bezierCurveTo(x + 8, y + 4.5, x + 8, y, x + 5, y);
        shape.bezierCurveTo(x + 3.5, y, x + 2.5, y + 2.5, x + 2.5, y + 2.5);
        
        const extrudeSettings = {
            depth: 0.5,
            bevelEnabled: true,
            bevelSegments: 2,
            steps: 2,
            bevelSize: 0.1,
            bevelThickness: 0.1
        };
        
        return new THREE.ExtrudeGeometry(shape, extrudeSettings);
    }
}