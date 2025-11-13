import * as THREE from 'three';

function initThreeScene() {
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    
    // Enhanced renderer with better settings
    const renderer = new THREE.WebGLRenderer({ 
        antialias: true, 
        alpha: true,
        powerPreference: "high-performance"
    });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    
    const container = document.getElementById('three-container');
    if (container) {
        container.appendChild(renderer.domElement);
    }

    // Create multiple geometric shapes for a futuristic look
    const geometries = [];
    const materials = [];
    const meshes = [];

    // Main central rotating structure
    const torusGeometry = new THREE.TorusGeometry(1, 0.3, 16, 100);
    const torusMaterial = new THREE.MeshBasicMaterial({ 
        color: 0xF56834,
        wireframe: true,
        transparent: true,
        opacity: 0.8
    });
    const torus = new THREE.Mesh(torusGeometry, torusMaterial);
    scene.add(torus);
    meshes.push(torus);

    // Orbiting cubes
    for (let i = 0; i < 6; i++) {
        const cubeGeometry = new THREE.BoxGeometry(0.2, 0.2, 0.2);
        const cubeMaterial = new THREE.MeshBasicMaterial({ 
            color: i % 2 === 0 ? 0xF56834 : 0xFFCD37,
            transparent: true,
            opacity: 0.7
        });
        const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
        
        const angle = (i / 6) * Math.PI * 2;
        cube.position.x = Math.cos(angle) * 3;
        cube.position.z = Math.sin(angle) * 3;
        cube.position.y = Math.sin(angle) * 0.5;
        
        scene.add(cube);
        meshes.push(cube);
    }

    // Particle system
    const particleCount = 200;
    const particleGeometry = new THREE.BufferGeometry();
    const particlePositions = new Float32Array(particleCount * 3);
    const particleColors = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount; i++) {
        particlePositions[i * 3] = (Math.random() - 0.5) * 20;
        particlePositions[i * 3 + 1] = (Math.random() - 0.5) * 20;
        particlePositions[i * 3 + 2] = (Math.random() - 0.5) * 20;
        
        // Orange-ish colors
        particleColors[i * 3] = 0.96; // R
        particleColors[i * 3 + 1] = 0.41; // G  
        particleColors[i * 3 + 2] = 0.20; // B
    }

    particleGeometry.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
    particleGeometry.setAttribute('color', new THREE.BufferAttribute(particleColors, 3));

    const particleMaterial = new THREE.PointsMaterial({
        size: 0.05,
        vertexColors: true,
        transparent: true,
        opacity: 0.6
    });

    const particles = new THREE.Points(particleGeometry, particleMaterial);
    scene.add(particles);

    camera.position.z = 5;
    camera.position.y = 1;

    // Animation variables
    let time = 0;

    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;

        // Rotate main torus
        torus.rotation.x += 0.005;
        torus.rotation.y += 0.01;

        // Animate orbiting cubes
        meshes.slice(1).forEach((cube, index) => {
            const angle = time + (index / 6) * Math.PI * 2;
            cube.position.x = Math.cos(angle) * 3;
            cube.position.z = Math.sin(angle) * 3;
            cube.position.y = Math.sin(angle + time) * 0.5;
            
            cube.rotation.x += 0.02;
            cube.rotation.y += 0.02;
        });

        // Rotate particle system
        particles.rotation.y += 0.001;
        particles.rotation.x += 0.0005;

        // Camera subtle movement
        camera.position.x = Math.sin(time * 0.5) * 0.5;
        camera.position.y = 1 + Math.cos(time * 0.3) * 0.2;
        camera.lookAt(0, 0, 0);

        renderer.render(scene, camera);
    }

    animate();

    // Handle window resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    // Mouse interaction
    let mouseX = 0, mouseY = 0;
    
    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX / window.innerWidth) * 2 - 1;
        mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
        
        // Subtle camera movement based on mouse
        camera.position.x += (mouseX * 0.5 - camera.position.x) * 0.05;
        camera.position.y += (mouseY * 0.5 - camera.position.y) * 0.05;
    });
}

// Initialize particles background
function initParticlesBackground() {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const container = document.getElementById('particles-bg');
    
    if (!container) return;
    
    canvas.style.position = 'absolute';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.pointerEvents = 'none';
    container.appendChild(canvas);
    
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    const particles = [];
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            vx: (Math.random() - 0.5) * 0.5,
            vy: (Math.random() - 0.5) * 0.5,
            size: Math.random() * 2 + 1
        });
    }
    
    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach(particle => {
            particle.x += particle.vx;
            particle.y += particle.vy;
            
            if (particle.x < 0 || particle.x > canvas.width) particle.vx *= -1;
            if (particle.y < 0 || particle.y > canvas.height) particle.vy *= -1;
            
            ctx.beginPath();
            ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(245, 104, 52, 0.3)`;
            ctx.fill();
        });
        
        requestAnimationFrame(animateParticles);
    }
    
    animateParticles();
}

document.addEventListener('DOMContentLoaded', () => {
    initThreeScene();
    initParticlesBackground();
});