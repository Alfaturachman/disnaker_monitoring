#!/bin/bash
# ============================================================
# DISNAKER Media Monitoring — Design System & Rules
# Government Theme | Semarang Red Palette
# ============================================================
# Cara pakai: source skill.sh (atau baca langsung isinya)
# ============================================================

# -----------------------------------------------------------
# 1. DESIGN TOKENS (CSS Variables)
# -----------------------------------------------------------
# Semua komponen WAJIB menggunakan CSS variables ini:
#
# --brand-50:  #fef2f2    (lightest red background)
# --brand-100: #fee2e2    (light red border/hover)
# --brand-500: #ef4444    (accent red)
# --brand-600: #dc2626    (primary red text/icon)
# --brand-700: #b91c1c    (primary button, active state)
# --brand-800: #991b1b    (button hover, dark bg)
# --brand-900: #7f1d1d    (darker bg)
# --brand-950: #450a0a    (darkest bg, footer, hero overlay)
#
# Neutral:
# --gray-50  — #f8fafc (page bg)
# --gray-100 — #f1f5f9 (section bg)
# --gray-200 — #e2e8f0 (border)
# --gray-500 — #64748b (secondary text)
# --gray-700 — #334155 (body text)
# --gray-900 — #0f172a (heading text)
#
# Typography:
# --font-sans:    'Inter', system-ui, sans-serif  (body)
# --font-display: 'Plus Jakarta Sans', sans-serif (heading)
#
# DO NOT use raw hex colors like #2563eb (blue).
# DO NOT use font-family 'Catamaran' — use --font-display instead.

# -----------------------------------------------------------
# 2. COMPONENT RULES
# -----------------------------------------------------------

# --- Button Primary ---
# Background: var(--brand-700)
# Hover:      var(--brand-800)
# Text:       #fff
# Font:       var(--font-display)
# Radius:     var(--radius-md)
# Shadow:     0 4px 6px -1px rgba(185, 28, 28, 0.2)
# Hover transform: translateY(-1px)

# --- Button Secondary ---
# Background: transparent
# Border: 2px solid rgba(255,255,255,0.25)
# Text: #fff
# Hover: bg rgba(255,255,255,0.1), border opacity 0.5

# --- Filter Chip ---
# Shape: pill (border-radius: 999px)
# Inactive: transparent bg, gray-500 text, no border
# Hover: brand-50 bg, underline indicator (::after)
# Active: brand-700 bg, white text, subtle shadow

# --- Card ---
# Background: #fff
# Border: 1px solid var(--gray-200)
# Radius: var(--radius-xl)
# Hover: translateY(-4px), shadow-lg, border brand-100

# --- Feature Icon Box ---
# Size: 48x48
# Background: var(--brand-50)
# Icon color: var(--brand-600)
# Radius: var(--radius-md)

# --- Section Badge ---
# Pill shape (border-radius: 999px)
# Background: var(--brand-50)
# Text color: var(--brand-700)
# Text transform: uppercase
# Font weight: 600

# -----------------------------------------------------------
# 3. LAYOUT
# -----------------------------------------------------------
# Hero section:    height: 100vh, max 900px
# Page hero:       min-height: 300px, gradient brand-950→brand-800
# Section padding: 5rem 0 (80px)
# Container:       max-width: 1200px, padding: 0 24px
# Navbar height:   72px
# Page body:       padding-top: 72px (on non-home pages)

# -----------------------------------------------------------
# 4. GRADIENTS (Body Background)
# -----------------------------------------------------------
# Login page: linear-gradient(135deg, #7f1d1d 0%, var(--brand-800) 50%, var(--brand-700) 100%)
# Footer:     linear-gradient(135deg, var(--brand-950) 0%, #1a0303 100%)
# Hero overlay: linear-gradient(135deg, var(--brand-950) 0%, rgba(69,10,10,0.75) 50%, var(--brand-950) 100%)
# Page hero:    linear-gradient(160deg, var(--brand-950) 0%, var(--brand-900) 40%, var(--brand-800) 100%)

# -----------------------------------------------------------
# 5. RESPONSIVE BREAKPOINTS
# -----------------------------------------------------------
# 992px:  tablet — 2 column grids
# 768px:  mobile — stacked navbar, single column
# 640px:  small mobile — compact padding, stacked buttons

# -----------------------------------------------------------
# 6. NAMING CONVENTIONS
# -----------------------------------------------------------
# Class:     lowercase-hyphenated (BEM-like)
# Variables: --kebab-case
# Files:     lowercase with underscores (_) for PHP views
# Pages:     page-{name} class on <body>

# -----------------------------------------------------------
# 7. FORBIDDEN
# -----------------------------------------------------------
# - Jangan pakai warna biru (#2563eb, #1d4ed8, dll)
# - Jangan pakai font 'Catamaran'
# - Jangan pakai warna hex langsung — selalu pakai CSS variables
# - Jangan taruh <style> di BOTTOM file — taruh di TOP
# - Jangan pakai inline style untuk warna/font

echo "=== DISNAKER Design System Loaded ==="
echo "Brand: Semarang Red | Font: Plus Jakarta Sans + Inter"
