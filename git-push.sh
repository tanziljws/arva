#!/bin/bash

# Git Auto-Push Script
# This script adds, commits, and pushes all changes to GitHub

echo "🔄 Checking for changes..."

# Check if there are any changes
if [ -z "$(git status --porcelain)" ]; then
    echo "✅ No changes to commit"
    exit 0
fi

# Show status
git status

# Add all changes
echo ""
echo "📦 Adding all changes..."
git add .

# Commit with message
if [ -z "$1" ]; then
    COMMIT_MSG="Update: $(date '+%Y-%m-%d %H:%M:%S')"
else
    COMMIT_MSG="$1"
fi

echo ""
echo "💾 Committing changes..."
git commit -m "$COMMIT_MSG"

# Push to GitHub
echo ""
echo "🚀 Pushing to GitHub..."
git push origin main

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Successfully pushed to GitHub!"
else
    echo ""
    echo "❌ Error pushing to GitHub"
    exit 1
fi

